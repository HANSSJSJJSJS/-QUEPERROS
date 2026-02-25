<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $users = User::query()
            ->orderByDesc('id')
            ->get();

        // Aquí más adelante puedes pasar contadores reales desde la BD
        $stats = [
            'total_users' => 5,
            'active_services' => 6,
            'defined_roles' => 3,
        ];

        return view('admin.dashboardAdmin', [
            'user' => $user,
            'stats' => $stats,
            'users' => $users,
        ]);
    }
}
