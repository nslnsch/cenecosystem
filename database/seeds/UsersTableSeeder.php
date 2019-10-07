<?php

use Illuminate\Database\Seeder;
use App\User;
use PhpParser\Node\Expr\Assign;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User Usuario---------------------
        $usuario=User::create([
            'id_rol' => '1',
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'password' => 'Keysecret*.1'
        ]);
        $usuario -> assignRole('usuario');

        //User Administrador-------------
        $admin=User::create([
            'id_rol' => '2',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'Keysecret*.1'
        ]);
        $admin -> assignRole('admin');

        //User Super-Admin---------------
        $super_admin=User::create([
            'id_rol' => '3',
            'name' => 'Superadmin',
            'email' => 'nslnula@gmail.com',
            'password' => 'Keysecret*.1'
        ]);
        $super_admin -> assignRole('super-admin');
    }
}
