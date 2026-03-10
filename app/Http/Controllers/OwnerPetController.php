<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class OwnerPetController extends Controller
{
    public function store(Request $request)
    {
        $owner = Auth::user();

        if (! $owner || $owner->rol !== 'dueno') {
            abort(403);
        }

        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'in:Perro,Gato'],
            'raza' => ['required', 'string', 'max:255'],
            'edad' => ['nullable', 'integer', 'min:0', 'max:50'],
            'sexo' => ['nullable', 'string', 'max:50'],
            'telefono' => ['nullable', 'string', 'max:60'],
            'info_adicional' => ['nullable', 'string', 'max:3000'],
        ]);

        $data = [
            'id_dueno' => (int) $owner->id,
            'nombre' => $validated['nombre'],
            'tipo' => $validated['tipo'],
            'raza' => $validated['raza'],
            'edad' => $validated['edad'] ?? null,
            'sexo' => $validated['sexo'] ?? null,
            'nombre_tutor' => (string) ($owner->name ?? ''),
            'telefono' => $validated['telefono'] ?? null,
            'informacion_adicional' => $validated['info_adicional'] ?? null,
            'estado_actual' => 'En Casa',
        ];

        $columns = Schema::getColumnListing('mascotas');
        $data = array_filter(
            $data,
            fn ($_, $key) => in_array($key, $columns, true),
            ARRAY_FILTER_USE_BOTH
        );

        Mascota::create($data);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Mascota registrada correctamente.');
    }
}
