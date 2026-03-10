<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $petsCount = Mascota::query()
            ->where('id_dueno', (int) $user->id)
            ->count();

        $pets = Mascota::query()
            ->where('id_dueno', (int) $user->id)
            ->orderByDesc('id_mascota')
            ->limit(5)
            ->get();

        return view('dueños.dashboarddueño', [
            'user' => $user,
            'pets' => $pets,
            'petsCount' => $petsCount,
        ]);
    }
}
