<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'nombre_negocio',
        'direccion',
        'telefono',
        'email',
        'hora_apertura',
        'hora_cierre',
        'atiende_fines_semana',
        'notificaciones_email',
        'notificaciones_sms',
        'recordatorio_citas',
        'autenticacion_dos_factores',
        'cierre_sesion_minutos',
    ];
}
