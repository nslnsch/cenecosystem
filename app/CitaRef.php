<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CitaRef extends Model
{
    protected $fillable = [
        'id','id_cita','id_real'
    ];
    public $timestamps = false;
}
