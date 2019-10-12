<?php

use Illuminate\Database\Seeder;
use App\Referencia;

class ReferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Gerente

        $consultorio=Referencia::create([
            'ced_rif' => 'V-00000000',
            'nombre_ref' => 'Por Definir',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'GTE'
        ]);

        //Referencia Medicos

        $consultorio=Referencia::create([
            'ced_rif' => 'V-24537548',
            'nombre_ref' => 'Dra Maria Espinoza',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'MED'
        ]);
        $consultorio=Referencia::create([
            'ced_rif' => 'V-19145320',
            'nombre_ref' => 'Dr Hilarión Araujo',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'MED'
        ]);
        //Referencia Tecnicos

        $consultorio=Referencia::create([
            'ced_rif' => 'V-18966006',
            'nombre_ref' => 'Nelson Torres',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'TEC'
        ]);
        $consultorio=Referencia::create([
            'ced_rif' => 'V-14540620',
            'nombre_ref' => 'Rafael Dugarte',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'TEC'
        ]);
        //Referencia Externa

        $consultorio=Referencia::create([
            'ced_rif' => 'V-20531624',
            'nombre_ref' => 'Dr Trino Baptista',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
        $consultorio=Referencia::create([
            'ced_rif' => 'V-9567234',
            'nombre_ref' => 'Dr Ziomar López',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
    }
}
