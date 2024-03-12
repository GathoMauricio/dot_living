<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermisoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_usuario = Role::where('name', 'Super usuario')->first();

        Permission::create(['name' => 'detalle_pagos']);
        Permission::create(['name' => 'crear_pagos']);
        Permission::create(['name' => 'editar_pagos']);
        Permission::create(['name' => 'eliminar_pagos']);
        Permission::create(['name' => 'cargar_comprobante_pagos']);

        $super_usuario->givePermissionTo('detalle_pagos');
        $super_usuario->givePermissionTo('crear_pagos');
        $super_usuario->givePermissionTo('editar_pagos');
        $super_usuario->givePermissionTo('eliminar_pagos');
        $super_usuario->givePermissionTo('cargar_comprobante_pagos');
    }
}
