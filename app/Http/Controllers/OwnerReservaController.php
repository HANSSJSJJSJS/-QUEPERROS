<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OwnerReservaController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'servicio_id' => ['required', 'integer'],
            'mascota_id' => ['required', 'integer'],
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'date_format:H:i'],
            'comentarios' => ['nullable', 'string', 'max:3000'],
            'precio_estimado' => ['nullable', 'string', 'max:60'],
        ]);

        if (!Schema::hasTable('mascotas') || !Schema::hasColumn('mascotas', 'id_dueno')) {
            return redirect()->back()->withInput()->withErrors([
                'mascota_id' => 'No se pudo validar la mascota. Verifica la estructura de la base de datos.',
            ]);
        }

        $pet = DB::table('mascotas')
            ->where('id', (int) $validated['mascota_id'])
            ->where('id_dueno', (int) $user->id)
            ->first();

        if (!$pet) {
            return redirect()->back()->withInput()->withErrors([
                'mascota_id' => 'La mascota seleccionada no te pertenece o no existe.',
            ]);
        }

        if (!Schema::hasTable('servicios')) {
            return redirect()->back()->withInput()->withErrors([
                'servicio_id' => 'No se pudo validar el servicio. Verifica la estructura de la base de datos.',
            ]);
        }

        $serviceExists = DB::table('servicios')
            ->where('id', (int) $validated['servicio_id'])
            ->exists();

        if (!$serviceExists) {
            return redirect()->back()->withInput()->withErrors([
                'servicio_id' => 'El servicio seleccionado no existe.',
            ]);
        }

        $precio = null;
        $rawPrice = trim((string) ($validated['precio_estimado'] ?? ''));
        if ($rawPrice !== '' && mb_strtolower($rawPrice) !== 'consultar') {
            $digits = preg_replace('/[^0-9]/', '', $rawPrice);
            if ($digits !== '') {
                $precio = (float) $digits;
            }
        }

        $data = [
            'mascota_id' => (int) $validated['mascota_id'],
            'servicio_id' => (int) $validated['servicio_id'],
            'profesional_id' => null,
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'estado' => 'pendiente',
            'comentarios' => $validated['comentarios'] ?? null,
            'precio_estimado' => $precio,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $columns = Schema::hasTable('reservas') ? Schema::getColumnListing('reservas') : [];
        $data = array_filter(
            $data,
            fn ($_, $key) => in_array($key, $columns, true),
            ARRAY_FILTER_USE_BOTH
        );

        DB::table('reservas')->insert($data);

        return redirect()->route('owner.reservas')->with('success', 'Reserva creada correctamente.');
    }
}
