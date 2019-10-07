<?php

use Illuminate\Database\Seeder;
use App\Consultorio;

class ConsultorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultorio=Consultorio::create([
            'nombre_consult' => 'Consultorio1',
            'limite' => '5',
        ]);
        $consultorio=Consultorio::create([
            'nombre_consult' => 'Consultorio2',
            'limite' => '5',
        ]);
        $consultorio=Consultorio::create([
            'nombre_consult' => 'Consultorio3',
            'limite' => '5',
        ]);
        $consultorio=Consultorio::create([
            'nombre_consult' => 'Consultorio4',
            'limite' => '5',
        ]);
    }
}
