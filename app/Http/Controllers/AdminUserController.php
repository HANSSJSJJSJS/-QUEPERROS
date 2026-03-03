<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        // Más adelante puedes aplicar filtros / paginación
        $users = User::query()->orderByDesc('id')->get();

        $totalUsers = $users->count();
        $activeUsers = $users->whereNotNull('email_verified_at')->count();
        $inactiveUsers = $users->whereNull('email_verified_at')->count();
        $definedRoles = $users->pluck('rol')->filter()->unique()->count();

        return view('admin.users.gestionusarios', [
            'admin' => $admin,
            'users' => $users,
            'stats' => [
                'total_users' => $totalUsers,
                'active_users' => $activeUsers,
                'inactive_users' => $inactiveUsers,
                'defined_roles' => $definedRoles,
            ],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'rol' => ['required', 'string', 'in:admin,empleado,dueno,padrino,entrenador'],
        ]);

        $tempPassword = Str::password(12);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($tempPassword),
            'rol' => $validated['rol'],
        ]);

        return redirect()
            ->route('admin.users')
            ->with('status', 'Usuario registrado correctamente')
            ->with('temp_password', $tempPassword);
    }

    public function assignRole(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'rol' => ['required', 'string', 'in:admin,empleado,dueno,padrino,entrenador'],
        ]);

        $user = User::findOrFail($validated['user_id']);
        $user->rol = $validated['rol'];
        $user->save();

        return redirect()
            ->route('admin.dashboard')
            ->with('status', 'Rol asignado correctamente');
    }
}
