<?php

use Illuminate\Database\Seeder;
use App\CompEstudios;

class CompEstudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
public function run()
    {
        //Consultorio 1

        //Complemento del estudio EMG
        $consultorio=CompEstudios::create([
            'id_est' => '1',
            'subestudio' => '1M.EMG',
            'precio' => '200.000'
        ]);
        $consultorio=CompEstudios::create([
            'id_est' => '1',
            'subestudio' => '2M.EMG',
            'precio' => '250.000'
        ]);
        $consultorio=CompEstudios::create([
            'id_est' => '1',
            'subestudio' => '4M.EMG',
            'precio' => '300.000'
        ]);

        //Complemento del estudio VC
        $consultorio=CompEstudios::create([
            'id_est' => '2',
            'subestudio' => '1M.VC',
            'precio' => '200.000'
        ]);
        $consultorio=CompEstudios::create([
            'id_est' => '2',
            'subestudio' => '2M.VC',
            'precio' => '250.000'
        ]);
        $consultorio=CompEstudios::create([
            'id_est' => '2',
            'subestudio' => '4M.VC',
            'precio' => '300.000'
        ]);

        //Complemento del estudio EMG+VC
        $consultorio=CompEstudios::create([
            'id_est' => '3',
            'subestudio' => '1M.EMG.VC',
            'precio' => '400.000'
        ]);
        $consultorio=CompEstudios::create([
            'id_est' => '3',
            'subestudio' => '2M.EMG.VC',
            'precio' => '500.000'
        ]);
        $consultorio=CompEstudios::create([
            'id_est' => '3',
            'subestudio' => '4M.EMG.VC',
            'precio' => '600.000'
        ]);

        //Complemento del estudio PEA C1
        $consultorio=CompEstudios::create([
            'id_est' => '4',
            'subestudio' => 'U.PEA.C1',
            'precio' => '0'
        ]);

        //Complemento del estudio PEV
        $consultorio=CompEstudios::create([
            'id_est' => '5',
            'subestudio' => 'U.PEV',
            'precio' => '200.000'
        ]);

        //Complemento del estudio PESS
        $consultorio=CompEstudios::create([
            'id_est' => '6',
            'subestudio' => 'U.PESS',
            'precio' => '250.000'
        ]);

        //Complemento del estudio PEM
        $consultorio=CompEstudios::create([
            'id_est' => '7',
            'subestudio' => 'U.PEM',
            'precio' => '0'
        ]);

        //Consultorio 2

        //Complemento del estudio TNFB
        $consultorio=CompEstudios::create([
            'id_est' => '8',
            'subestudio' => 'U.TNFB',
            'precio' => '200.000'
        ]);

        //Complemento del estudio AUD
        $consultorio=CompEstudios::create([
            'id_est' => '9',
            'subestudio' => 'U.AUD',
            'precio' => '0'
        ]);

        //Complemento del estudio PEA C2
        $consultorio=CompEstudios::create([
            'id_est' => '10',
            'subestudio' => 'U.PEA.C2',
            'precio' => '0'
        ]);

        //Consultorio 3

        //Complemento del estudio EEG
        $consultorio=CompEstudios::create([
            'id_est' => '11',
            'subestudio' => 'U.EEG.C3',
            'precio' => '200.000'
        ]);

        //Complemento del estudio BM
        $consultorio=CompEstudios::create([
            'id_est' => '12',
            'subestudio' => 'U.BM',
            'precio' => '0'
        ]);

        //Complemento del estudio ONDA P300
        $consultorio=CompEstudios::create([
            'id_est' => '13',
            'subestudio' => 'U.ONDA.P300',
            'precio' => '200.000'
        ]);

        //Complemento del estudio EEG+ONDA P300
        $consultorio=CompEstudios::create([
            'id_est' => '14',
            'subestudio' => 'U.EEG.ONDA.P300',
            'precio' => '0'
        ]);

        //Complemento del estudio BM+ONDA P300
        $consultorio=CompEstudios::create([
            'id_est' => '15',
            'subestudio' => 'U.BM.ONDA.P300',
            'precio' => '0'
        ]);
        //Consultorio 4

        //Complemento del estudio EEG
        $consultorio=CompEstudios::create([
            'id_est' => '16',
            'subestudio' => 'U.EEG.C4',
            'precio' => '200.000'
        ]);
    }
}
