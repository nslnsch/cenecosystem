<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        //create permissions
        Permission::create(['name'=>'create']);
        Permission::create(['name'=>'read']);
        Permission::create(['name'=>'update']);
        Permission::create(['name'=>'delete']);

        Permission::create(['name'=>'create user']);
        Permission::create(['name'=>'read user']);
        Permission::create(['name'=>'update user']);
        Permission::create(['name'=>'delete user']);

        Permission::create(['name'=>'create role']);
        Permission::create(['name'=>'read role']);
        Permission::create(['name'=>'update role']);
        Permission::create(['name'=>'delete role']);

        Permission::create(['name'=>'create permission']);
        Permission::create(['name'=>'read permission']);
        Permission::create(['name'=>'update permission']);
        Permission::create(['name'=>'delete permission']);

        //create roles and assign created permissions
        $role_usuario=Role::create(['name'=>'usuario']);
        $role_usuario->givePermissionTo('read');
        $role_usuario->givePermissionTo('create');
        $role_usuario->givePermissionTo('update');
        $role_usuario->givePermissionTo('create user');
        $role_usuario->givePermissionTo('update user');
        ///////////////////////////////////////////////////////////
        $role_admin=Role::create(['name'=>'admin']);
        $role_admin->givePermissionTo('read');
        $role_admin->givePermissionTo('create');
        $role_admin->givePermissionTo('create user');
        $role_admin->givePermissionTo('read user');
        $role_admin->givePermissionTo('update user');
        //$role_admin->givePermissionTo('delete');
        ///////////////////////////////////////////////////////////
        $role_super_admin=Role::create(['name'=>'super-admin']);
        $role_super_admin->givePermissionTo(Permission::all());
    }
}
