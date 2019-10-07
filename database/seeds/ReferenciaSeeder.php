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
            'nombre_ref' => 'Por Definir',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'GTE'
        ]);

        //Referencia Interna

        $consultorio=Referencia::create([
            'nombre_ref' => 'Dra Maria Espinoza',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'INT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dra Vilma Reinozo',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'INT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dra Sandra Contreras',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'INT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dr Hilarión Araujo',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'INT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dr Antonio Uzcategui',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'INT'
        ]);

        //Referencia Externa

        $consultorio=Referencia::create([
            'nombre_ref' => 'Dr Trino Baptista',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dr Ziomar López',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dra Marielena Valecillos',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dra Gloria Márquez',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dr Ignacio Sandia',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Lic Verónica Serrano',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
        $consultorio=Referencia::create([
            'nombre_ref' => 'Dra Maríangelina Lacruz',
            'telefono_ref' => '0424-7683789',
            'tipo_ref' => 'EXT'
        ]);
    }
}
