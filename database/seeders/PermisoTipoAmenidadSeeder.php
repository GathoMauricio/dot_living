<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisoTipoAmenidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'create_tipo_amenidad']);

        $super_usuario = Role::where('name', 'Super usuario')->first();
        $administrador = Role::where('name', 'Administrador')->first();
        $auditor = Role::where('name', 'Auditor')->first();

        $super_usuario->givePermissionTo('create_tipo_amenidad');
        $administrador->givePermissionTo('create_tipo_amenidad');
        $auditor->givePermissionTo('create_tipo_amenidad');
    }
}
