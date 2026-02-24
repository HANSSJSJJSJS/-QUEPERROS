<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
}
