<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisoAmenidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'detalle_amenidad']);
        Permission::create(['name' => 'crear_amenidad']);
        Permission::create(['name' => 'canbiar_estatus_amenidad']);

        $residente = Role::where('name', 'Residente')->first();
        $administrador = Role::where('name', 'Administrador')->first();
        $auditor = Role::where('name', 'Auditor')->first();
        $super_susuario = Role::where('name', 'Super usuario')->first();

        $residente->givePermissionTo('detalle_amenidad');
        $residente->givePermissionTo('crear_amenidad');

        $administrador->givePermissionTo('detalle_amenidad');
        $administrador->givePermissionTo('canbiar_estatus_amenidad');

        $auditor->givePermissionTo('detalle_amenidad');
        $auditor->givePermissionTo('canbiar_estatus_amenidad');

        $super_susuario->givePermissionTo('detalle_amenidad');
    }
}
