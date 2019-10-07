<?php

namespace App\Services;

use App\Consultorio;

class Consultorios
{
    public function get()
    {
        $consultorios = Consultorio::get();
        $consultoriosArray[''] = 'Selecciona un Consultorio';
        foreach ($consultorios as $consultorio) {
            $consultoriosArray[$consultorio->id] = $consultorio->nombre_consult;
        }
        return $consultoriosArray;
    }
}