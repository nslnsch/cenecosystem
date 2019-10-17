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
            'tipo_persona' => 'N',
            'ced_rif' => 'V-00000000-0',
            'nombre_ref' => 'Por Definir',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'GTE'
        ]);

        //Referencia Medicos

        $consultorio=Referencia::create([
            'tipo_persona' => 'N',
            'ced_rif' => 'V-24537548-1',
            'nombre_ref' => 'Dra Maria Espinoza',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'MED'
        ]);
        $consultorio=Referencia::create([
            'tipo_persona' => 'N',
            'ced_rif' => 'V-19145320-1',
            'nombre_ref' => 'Dr Hilarión Araujo',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'MED'
        ]);
        //Referencia Tecnicos

        $consultorio=Referencia::create([
            'tipo_persona' => 'N',
            'ced_rif' => 'V-18966006-1',
            'nombre_ref' => 'Nelson Torres',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'TEC'
        ]);
        $consultorio=Referencia::create([
            'tipo_persona' => 'N',
            'ced_rif' => 'V-14540620-1',
            'nombre_ref' => 'Rafael Dugarte',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'TEC'
        ]);
        //Referencia Externa

        $consultorio=Referencia::create([
            'tipo_persona' => 'N',
            'ced_rif' => 'V-20531624-1',
            'nombre_ref' => 'Dr Trino Baptista',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
        $consultorio=Referencia::create([
            'tipo_persona' => 'N',
            'ced_rif' => 'V-9567234-1',
            'nombre_ref' => 'Dr Ziomar López',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
    }
}
