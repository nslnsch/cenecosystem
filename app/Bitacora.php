<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bitacora';

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'ip', 'log','fecha'];
    public $timestamps = false;

}
