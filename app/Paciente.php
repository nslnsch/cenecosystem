<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'cedula','nombre', 'apellido', 'telefono','fechnac','dirhab'
    ];

}
