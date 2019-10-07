<?php

use Illuminate\Database\Seeder;
use App\Estudio;

class EstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Estudios del Consultorio 1
        $consultorio=Estudio::create([
            'id_consult' => '1',
            'nombre_est' => 'EMG',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '1',
            'nombre_est' => 'VC',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '1',
            'nombre_est' => 'EMG+VC',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '1',
            'nombre_est' => 'PEA',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '1',
            'nombre_est' => 'PEV',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '1',
            'nombre_est' => 'PESS',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '1',
            'nombre_est' => 'PEM',
        ]);

        //Estudios del Consultorio 2
        $consultorio=Estudio::create([
            'id_consult' => '2',
            'nombre_est' => 'TNFB',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '2',
            'nombre_est' => 'AUD',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '2',
            'nombre_est' => 'PEA',
        ]);

        //Estudios del Consultorio 3
        $consultorio=Estudio::create([
            'id_consult' => '3',
            'nombre_est' => 'EEG',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '3',
            'nombre_est' => 'BM',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '3',
            'nombre_est' => 'ONDA P300',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '3',
            'nombre_est' => 'EEG+ONDA P300',
        ]);
        $consultorio=Estudio::create([
            'id_consult' => '3',
            'nombre_est' => 'BM+ONDA P300',
        ]);
        //Estudios del Consultorio 4
        $consultorio=Estudio::create([
            'id_consult' => '4',
            'nombre_est' => 'EEG',
        ]);
    }
}
