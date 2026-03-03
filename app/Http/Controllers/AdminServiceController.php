<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminServiceController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        $serviceRows = Servicio::query()
            ->orderByDesc('id_servicio')
            ->get();

        $categories = Servicio::query()
            ->select('categoria')
            ->whereNotNull('categoria')
            ->where('categoria', '!=', '')
            ->distinct()
            ->orderBy('categoria')
            ->pluck('categoria')
            ->values();

        $catColor = function (string $cat): string {
            return match (mb_strtolower($cat)) {
                'entrenamiento' => 'purple',
                'formacion trabajo', 'formación trabajo' => 'blue',
                'cuidado y alojamiento' => 'green',
                'actividades' => 'yellow',
                default => 'gray',
            };
        };

        $services = $serviceRows->map(function ($r) use ($catColor) {
            return [
                'id_servicio' => $r->id_servicio,
                'category' => $r->categoria,
                'category_color' => $catColor((string) $r->categoria),
                'name' => $r->nombre,
                'description' => $r->descripcion,
                'price' => (int) $r->precio,
                'duration' => $r->duracion,
                'rating' => 0,
                'usage_month' => 0,
                'active' => (bool) ($r->activo ?? 1),
            ];
        })->values();

        $totalServices = $serviceRows->count();
        $activeServices = $serviceRows->where('activo', 1)->count();
        $totalUses = 0;
        $estimatedRevenue = 0;

        return view('admin.services.gestionservicios', [
            'admin' => $admin,
            'services' => $services,
            'categories' => collect(['Todos'])->merge($categories)->values(),
            'stats' => [
                'total_services' => $totalServices,
                'active_services' => $activeServices,
                'total_uses' => $totalUses,
                'estimated_revenue' => $estimatedRevenue,
            ],
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['required', 'integer', 'min:0'],
            'duration' => ['required', 'string', 'max:60'],
            'category' => ['required', 'string', 'max:60'],
        ]);

        Servicio::create([
            'nombre' => $data['name'],
            'descripcion' => $data['description'] ?? '',
            'precio' => $data['price'],
            'duracion' => $data['duration'],
            'categoria' => $data['category'],
            'activo' => 1,
        ]);

        return redirect()->route('admin.services');
    }

    public function update(Request $request, Servicio $servicio)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['required', 'integer', 'min:0'],
            'duration' => ['required', 'string', 'max:60'],
            'category' => ['required', 'string', 'max:60'],
        ]);

        $servicio->update([
            'nombre' => $data['name'],
            'descripcion' => $data['description'] ?? '',
            'precio' => $data['price'],
            'duracion' => $data['duration'],
            'categoria' => $data['category'],
        ]);

        return redirect()->route('admin.services')->with('success', 'proceso exitoso');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();

        return redirect()->route('admin.services')->with('success', 'proceso exitoso');
    }

    public function toggleActive(Request $request, Servicio $servicio)
    {
        $request->validate([
            'active' => ['required', 'boolean'],
        ]);

        $servicio->update([
            'activo' => (bool) $request->boolean('active'),
        ]);

        return response()->json([
            'ok' => true,
            'active' => (bool) ($servicio->activo ?? false),
        ]);
    }
}
