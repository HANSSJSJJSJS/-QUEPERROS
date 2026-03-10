<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Dueno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AdminPetController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        $defaultOwnerId = (int) (User::query()->where('rol', 'dueno')->orderBy('id')->value('id') ?? 0);

        $owners = User::query()
            ->where('rol', 'dueno')
            ->orderBy('name')
            ->get(['id', 'name', 'email'])
            ->map(fn (User $u) => [
                'id' => (int) $u->id,
                'display' => (string) $u->name,
                'email' => (string) $u->email,
            ])
            ->values();

        $petRows = Mascota::query()
            ->orderByDesc('id')
            ->get();

        $ownerIds = $petRows
            ->pluck('id_dueno')
            ->filter()
            ->unique()
            ->values();

        $duenosById = (Schema::hasTable('duenos') && $ownerIds->isNotEmpty())
            ? DB::table('duenos')
                ->whereIn('id_dueno', $ownerIds)
                ->get(['id_dueno', 'user_id', 'telefono', 'direccion'])
                ->keyBy('id_dueno')
            : collect();

        $duenosByUserId = (Schema::hasTable('duenos') && $ownerIds->isNotEmpty())
            ? DB::table('duenos')
                ->whereIn('user_id', $ownerIds)
                ->get(['id_dueno', 'user_id', 'telefono', 'direccion'])
                ->keyBy('user_id')
            : collect();

        $userIds = $duenosById
            ->pluck('user_id')
            ->merge($duenosByUserId->pluck('user_id'))
            ->filter()
            ->unique()
            ->values();

        $ownerUsers = $userIds->isNotEmpty()
            ? User::query()->whereIn('id', $userIds)->get(['id', 'name', 'email'])->keyBy('id')
            : collect();

        $pets = $petRows->map(function (Mascota $p) use ($ownerUsers, $duenosById, $duenosByUserId) {
            $initials = mb_strtoupper(mb_substr((string) $p->nombre, 0, 2));
            $breedAge = trim(implode(' - ', array_filter([
                (string) $p->raza,
                (string) ($p->edad ?? ''),
            ])));

            $tags = array_values(array_filter([
                (string) ($p->servicio_requerido ?? ''),
                (string) ($p->tipo ?? ''),
            ]));

            $ownerId = (int) ($p->id_dueno ?? 0);
            $duenoRow = null;
            if ($ownerId > 0) {
                $duenoRow = $duenosById->get($ownerId);
                if (! $duenoRow) {
                    $duenoRow = $duenosByUserId->get($ownerId);
                }
            }

            $userId = $duenoRow ? (int) ($duenoRow->user_id ?? 0) : $ownerId;
            $ownerUser = $userId > 0 ? $ownerUsers->get($userId) : null;
            $ownerName = $ownerUser ? (string) ($ownerUser->name ?? '') : '';
            $ownerEmail = $ownerUser ? (string) ($ownerUser->email ?? '') : '';

            $duenoPhone = $duenoRow ? trim((string) ($duenoRow->telefono ?? '')) : '';
            $duenoAddress = $duenoRow ? trim((string) ($duenoRow->direccion ?? '')) : '';

            $tutor = trim((string) ($p->nombre_tutor ?? ''));
            if ($tutor === '') {
                $tutor = $ownerName;
            }

            $contact = $duenoPhone !== '' ? $duenoPhone : trim((string) ($p->telefono ?? ''));
            if ($contact === '') {
                $contact = $ownerEmail;
            }

            return [
                'id' => (int) $p->getKey(),
                'owner_id' => $ownerId,
                'user_id' => $userId,
                'owner_name' => $ownerName,
                'owner_email' => $ownerEmail,
                'name' => (string) $p->nombre,
                'initials' => $initials,
                'breed_age' => $breedAge,
                'breed' => (string) ($p->raza ?? ''),
                'age' => $p->edad !== null ? (string) $p->edad : '',
                'sex' => (string) ($p->sexo ?? ''),
                'status' => (string) (($p->estado_actual ?? $p->tipo) ?? 'En Casa'),
                'tags' => $tags,
                'depart' => (string) ($p->fecha_ultima_desparasitacion ?? ''),
                'last' => (string) ($p->fecha_ultima_vacuna_tos ?? ''),
                'program' => (string) ($p->servicio_requerido ?? ''),
                'trainer' => '',
                'progress' => null,

                'vaccines' => (string) ($p->vacunas ?? ''),
                'notes' => (string) ($p->notas_adicionales ?? ''),
                'behavior' => (string) ($p->informacion_adicional ?? ''),
                'service' => (string) ($p->servicio_requerido ?? ''),
                'tutor' => $tutor,
                'phone' => $contact,
                'address' => $duenoAddress,
                'ingreso' => (string) ($p->created_at ? $p->created_at->toDateString() : ''),
                'photo' => (string) ($p->foto ?? ''),
            ];
        })->values();

        $stats = [
            'total_pets' => $pets->count(),
            'guarderia' => $pets->where('status', 'En Guarderia')->count(),
            'hotel' => $pets->where('status', 'Hotel Canino')->count(),
            'entrenamiento' => $pets->where('status', 'En Entrenamiento')->count(),
        ];

        return view('admin.pets.gestionmascotas', [
            'admin' => $admin,
            'pets' => $pets,
            'stats' => $stats,
            'defaultOwnerId' => $defaultOwnerId,
            'owners' => $owners,
        ]);
    }

    public function store(Request $request)
    {
        $incomingOwnerId = (int) $request->input('id_dueno', 0);
        if ($incomingOwnerId <= 0) {
            $defaultOwnerId = (int) (User::query()->where('rol', 'dueno')->orderBy('id')->value('id') ?? 0);
            if ($defaultOwnerId <= 0) {
                return redirect()
                    ->route('admin.pets')
                    ->withErrors(['id_dueno' => 'No hay dueños registrados. No se puede registrar una mascota.']);
            }
            $request->merge(['id_dueno' => $defaultOwnerId]);
        }

        $validated = $request->validate([
            'id_dueno' => ['required', 'integer', 'exists:users,id'],
            'nombre' => ['required', 'string', 'max:255'],
            'tipo' => ['required', 'string', 'in:Perro,Gato'],
            'raza' => ['required', 'string', 'max:255'],
            'edad' => ['nullable', 'integer', 'min:0', 'max:50'],
            'sexo' => ['nullable', 'string', 'max:50'],
            'foto' => ['nullable', 'image', 'max:2048'],

            'vacunas' => ['nullable', 'string', 'max:1000'],
            'fecha_ultima_desparasitacion' => ['nullable', 'date'],
            'fecha_ultima_vacuna_tos' => ['nullable', 'date'],

            'telefono' => ['nullable', 'string', 'max:60'],

            'info_adicional' => ['nullable', 'string', 'max:3000'],
            'servicio_requerido' => ['nullable', 'string', 'max:255'],
            'estado_actual' => ['nullable', 'string', 'max:255'],
            'notas_adicionales' => ['nullable', 'string', 'max:255'],
        ]);

        $owner = User::query()
            ->where('id', $validated['id_dueno'])
            ->where('rol', 'dueno')
            ->first();

        if (! $owner) {
            return redirect()
                ->route('admin.pets')
                ->withErrors(['id_dueno' => 'Debes seleccionar un dueño registrado.']);
        }

        if (Schema::hasTable('duenos')) {
            $exists = DB::table('duenos')
                ->where('id_dueno', (int) $owner->id)
                ->exists();

            if (! $exists) {
                $duenoData = [
                    'id_dueno' => (int) $owner->id,
                ];

                $duenosCols = Schema::getColumnListing('duenos');
                if (in_array('nombre', $duenosCols, true)) {
                    $duenoData['nombre'] = (string) $owner->name;
                }
                if (in_array('telefono', $duenosCols, true)) {
                    $duenoData['telefono'] = null;
                }
                if (in_array('direccion', $duenosCols, true)) {
                    $duenoData['direccion'] = null;
                }
                if (in_array('created_at', $duenosCols, true)) {
                    $duenoData['created_at'] = now();
                }
                if (in_array('updated_at', $duenosCols, true)) {
                    $duenoData['updated_at'] = now();
                }

                DB::table('duenos')->insert($duenoData);
            }
        }

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pets', 'public');
        }

        $ownerName = (string) $owner->name;

        $data = [
            'id_dueno' => $validated['id_dueno'],
            'nombre' => $validated['nombre'],
            'tipo' => $validated['tipo'],
            'raza' => $validated['raza'],
            'edad' => array_key_exists('edad', $validated) ? $validated['edad'] : null,
            'sexo' => $validated['sexo'] ?? null,
            'foto' => $fotoPath,
            'vacunas' => $validated['vacunas'] ?? null,
            'fecha_ultima_desparasitacion' => $validated['fecha_ultima_desparasitacion'] ?? null,
            'fecha_ultima_vacuna_tos' => $validated['fecha_ultima_vacuna_tos'] ?? null,
            'nombre_tutor' => $ownerName,
            'telefono' => $validated['telefono'] ?? null,
            'informacion_adicional' => $validated['info_adicional'] ?? null,
            'servicio_requerido' => $validated['servicio_requerido'] ?? null,
            'estado_actual' => $validated['estado_actual'] ?? null,
            'notas_adicionales' => $validated['notas_adicionales'] ?? null,
        ];

        $columns = Schema::getColumnListing('mascotas');
        $data = array_filter(
            $data,
            fn ($_, $key) => in_array($key, $columns, true),
            ARRAY_FILTER_USE_BOTH
        );

        Mascota::create($data);

        return redirect()
            ->route('admin.pets')
            ->with('success', 'Mascota registrada correctamente');
    }

    public function update(Request $request, Mascota $mascota)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'raza' => ['required', 'string', 'max:255'],
            'edad' => ['nullable', 'integer', 'min:0', 'max:50'],
            'sexo' => ['nullable', 'string', 'max:50'],
            'vacunas' => ['nullable', 'string', 'max:1000'],
            'fecha_ultima_desparasitacion' => ['nullable', 'date'],
            'fecha_ultima_vacuna_tos' => ['nullable', 'date'],
            'info_adicional' => ['nullable', 'string', 'max:3000'],
            'servicio_requerido' => ['nullable', 'string', 'max:255'],
            'estado_actual' => ['nullable', 'string', 'max:255'],
            'notas_adicionales' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:60'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        $data = [
            'nombre' => $validated['nombre'],
            'raza' => $validated['raza'],
            'edad' => array_key_exists('edad', $validated) ? $validated['edad'] : null,
            'sexo' => $validated['sexo'] ?? null,
            'vacunas' => $validated['vacunas'] ?? null,
            'fecha_ultima_desparasitacion' => $validated['fecha_ultima_desparasitacion'] ?? null,
            'fecha_ultima_vacuna_tos' => $validated['fecha_ultima_vacuna_tos'] ?? null,
            'informacion_adicional' => $validated['info_adicional'] ?? null,
            'servicio_requerido' => $validated['servicio_requerido'] ?? null,
            'estado_actual' => $validated['estado_actual'] ?? null,
            'notas_adicionales' => $validated['notas_adicionales'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pets', 'public');
        }

        $columns = Schema::getColumnListing('mascotas');
        $data = array_filter(
            $data,
            fn ($_, $key) => in_array($key, $columns, true),
            ARRAY_FILTER_USE_BOTH
        );

        $mascota->fill($data);
        $mascota->save();

        return redirect()
            ->route('admin.pets')
            ->with('success', 'Mascota actualizada correctamente');
    }

    public function destroy(Mascota $mascota)
    {
        $foto = (string) ($mascota->foto ?? '');

        $mascota->delete();

        if ($foto !== '' && Storage::disk('public')->exists($foto)) {
            Storage::disk('public')->delete($foto);
        }

        return redirect()
            ->route('admin.pets')
            ->with('success', 'Operación exitosa. Se eliminó la mascota correctamente');
    }
}
