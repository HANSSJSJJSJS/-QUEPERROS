<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $fullName = trim($validated['first_name'] . ' ' . $validated['last_name']);

        $data = [
            'name' => $fullName,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ];

        if (Schema::hasColumn('users', 'rol')) {
            $data['rol'] = 'dueno';
        }

        if (Schema::hasColumn('users', 'nombre')) {
            $data['nombre'] = $fullName;
        }

        if (Schema::hasColumn('users', 'apellido')) {
            $data['apellido'] = $validated['last_name'];
        }

        User::create($data);

        return redirect()
            ->route('login')
            ->with('status', 'Usuario registrado correctamente');
    }
}
