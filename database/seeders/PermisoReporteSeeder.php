<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisoReporteSeeder extends Seeder
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
        Permission::create(['name' => 'detalle_reportes']);
        Permission::create(['name' => 'crear_reportes']);

        $residente = Role::where('name', 'Residente')->first();

        $residente->givePermissionTo('detalle_reportes');
        $residente->givePermissionTo('crear_reportes');
    }
}
