<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascotas';

    protected $primaryKey = 'id_mascota';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'id_dueno',
        'nombre',
        'foto',
        'tipo',
        'raza',
        'edad',
        'sexo',
        'vacunas',
        'fecha_ultima_desparasitacion',
        'fecha_ultima_vacuna_tos',
        'informacion_adicional',
        'servicio_requerido',
        'nombre_tutor',
        'telefono',
        'estado_actual',
        'notas_adicionales',
    ];
}
