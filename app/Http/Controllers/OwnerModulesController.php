<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerModulesController extends Controller
{
    public function reservas()
    {
        $user = Auth::user();

        return view('dueños.reservas', [
            'user' => $user,
        ]);
    }

    public function seguimiento()
    {
        $user = Auth::user();

        return view('dueños.seguimiento', [
            'user' => $user,
        ]);
    }

    public function pagos()
    {
        $user = Auth::user();

        return view('dueños.pagos', [
            'user' => $user,
        ]);
    }

    public function planPadrino()
    {
        $user = Auth::user();

        return view('dueños.planpadrino', [
            'user' => $user,
        ]);
    }

    public function perfil()
    {
        $user = Auth::user();

        return view('dueños.perfil', [
            'user' => $user,
        ]);
    }
}
