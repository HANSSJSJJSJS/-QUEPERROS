<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dueno extends Model
{
    use HasFactory;

    protected $table = 'duenos';

    protected $primaryKey = 'id_dueno';

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'user_id',
    ];
}
