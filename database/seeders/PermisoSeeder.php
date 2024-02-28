<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ##################CREAR ROLES #############################
        $super_usuario = Role::create(['name' => 'Super usuario']);

        #################CREAR PERMISOS############################
        Permission::create(['name' => 'modulo_roles_permisos']);


        //Asignar permisos al super usuario
        $super_usuario->givePermissionTo('modulo_roles_permisos');
    }
}
