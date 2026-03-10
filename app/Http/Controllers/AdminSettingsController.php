<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $settings = Setting::query()->first();

        return view('admin.settings.configuracion', [
            'user' => $user,
            'settings' => $settings,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nombre_negocio' => ['nullable', 'string', 'max:255'],
            'direccion' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'hora_apertura' => ['nullable', 'date_format:H:i'],
            'hora_cierre' => ['nullable', 'date_format:H:i'],
            'atiende_fines_semana' => ['nullable', 'boolean'],
            'notificaciones_email' => ['nullable', 'boolean'],
            'notificaciones_sms' => ['nullable', 'boolean'],
            'recordatorio_citas' => ['nullable', 'boolean'],
            'autenticacion_dos_factores' => ['nullable', 'boolean'],
            'cierre_sesion_minutos' => ['nullable', 'integer', 'min:1', 'max:1440'],
        ]);

        $data['atiende_fines_semana'] = $request->boolean('atiende_fines_semana');
        $data['notificaciones_email'] = $request->boolean('notificaciones_email');
        $data['notificaciones_sms'] = $request->boolean('notificaciones_sms');
        $data['recordatorio_citas'] = $request->boolean('recordatorio_citas');
        $data['autenticacion_dos_factores'] = $request->boolean('autenticacion_dos_factores');

        $settings = Setting::query()->first();
        if (! $settings) {
            $settings = new Setting();
        }

        $settings->fill($data);
        $settings->save();

        return redirect()
            ->route('admin.settings')
            ->with('success', 'Cambios guardados correctamente');
    }
}
