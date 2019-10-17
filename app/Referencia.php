<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $fillable = [
        'id','ced_rif','nombre_ref','telefono_ref','tipo_ref'
    ];
}
