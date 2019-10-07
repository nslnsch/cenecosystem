<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'id_pac','id_est','id_ref','edad','genero','tipo_cita','fecha'
    ];
    public $timestamps = false;
}
