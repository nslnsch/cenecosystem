<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompEstudios extends Model
{
    protected $fillable = [
        'id_est','subestudio','precio'
    ];
}
