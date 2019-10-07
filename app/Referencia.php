<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $fillable = [
        'id','nombre_ref','telefono_ref','tipo_ref'
    ];
}
