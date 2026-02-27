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
        $users = User::all();

        return view('admin.users.gestionusarios', [
            'admin' => $admin,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'rol' => ['required', 'string', 'in:admin,empleado,dueno,padrino'],
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
}
