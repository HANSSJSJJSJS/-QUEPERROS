<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('admin.settings.configuracion', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        return redirect()
            ->route('admin.settings')
            ->with('success', 'Cambios guardados correctamente');
    }
}
