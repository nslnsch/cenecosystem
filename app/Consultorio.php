<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{

    protected $fillable = [
        'id','nombre_consult','limite'
    ];
}
