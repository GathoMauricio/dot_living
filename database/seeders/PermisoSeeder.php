<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class PermisoSeeder extends Seeder
{
    public function run()
    {
        ##################CREAR ROLES #############################
        $super_usuario = Role::create(['name' => 'Super usuario']);
        $administrador = Role::create(['name' => 'Administrador']);
        $auditor = Role::create(['name' => 'Auditor']);
        $residente = Role::create(['name' => 'Residente']);

        #################CREAR PERMISOS############################
        Permission::create(['name' => 'modulo_roles_permisos']);

        Permission::create(['name' => 'modulo_usuarios']);
        Permission::create(['name' => 'detalle_usuarios']);
        Permission::create(['name' => 'crear_usuarios']);
        Permission::create(['name' => 'editar_usuarios']);
        Permission::create(['name' => 'eliminar_usuarios']);

        Permission::create(['name' => 'modulo_residencias']);
        Permission::create(['name' => 'detalle_residencias']);
        Permission::create(['name' => 'crear_residencias']);
        Permission::create(['name' => 'editar_residencias']);
        Permission::create(['name' => 'eliminar_residencias']);
        Permission::create(['name' => 'crear_media_residencias']);

        Permission::create(['name' => 'modulo_habitaciones']);
        Permission::create(['name' => 'detalle_habitaciones']);
        Permission::create(['name' => 'crear_habitaciones']);
        Permission::create(['name' => 'editar_habitaciones']);
        Permission::create(['name' => 'eliminar_habitaciones']);
        Permission::create(['name' => 'crear_media_habitaciones']);

        Permission::create(['name' => 'modulo_pagos']);

        Permission::create(['name' => 'modulo_reportes']);

        Permission::create(['name' => 'modulo_amenidades']);

        Permission::create(['name' => 'modulo_tablero']);

        Permission::create(['name' => 'modulo_mensajeria']);


        //Asignar permisos al super usuario
        $super_usuario->givePermissionTo('modulo_roles_permisos');

        $super_usuario->givePermissionTo('modulo_usuarios');
        $super_usuario->givePermissionTo('detalle_usuarios');
        $super_usuario->givePermissionTo('crear_usuarios');
        $super_usuario->givePermissionTo('editar_usuarios');
        $super_usuario->givePermissionTo('eliminar_usuarios');

        $super_usuario->givePermissionTo('modulo_residencias');
        $super_usuario->givePermissionTo('detalle_residencias');
        $super_usuario->givePermissionTo('crear_residencias');
        $super_usuario->givePermissionTo('editar_residencias');
        $super_usuario->givePermissionTo('eliminar_residencias');
        $super_usuario->givePermissionTo('crear_media_residencias');

        $super_usuario->givePermissionTo('modulo_habitaciones');
        $super_usuario->givePermissionTo('detalle_habitaciones');
        $super_usuario->givePermissionTo('crear_habitaciones');
        $super_usuario->givePermissionTo('editar_habitaciones');
        $super_usuario->givePermissionTo('eliminar_habitaciones');
        $super_usuario->givePermissionTo('crear_media_habitaciones');

        $super_usuario->givePermissionTo('modulo_pagos');
        $super_usuario->givePermissionTo('modulo_reportes');
        $super_usuario->givePermissionTo('modulo_amenidades');
        $super_usuario->givePermissionTo('modulo_tablero');
        $super_usuario->givePermissionTo('modulo_mensajeria');

        //Asignar permisos al administrador
        $administrador->givePermissionTo('modulo_residencias');
        $administrador->givePermissionTo('modulo_habitaciones');
        $administrador->givePermissionTo('modulo_pagos');
        $administrador->givePermissionTo('modulo_reportes');
        $administrador->givePermissionTo('modulo_amenidades');
        $administrador->givePermissionTo('modulo_tablero');
        $administrador->givePermissionTo('modulo_mensajeria');

        //Asignar permisos al auditor
        $auditor->givePermissionTo('modulo_habitaciones');
        $auditor->givePermissionTo('modulo_pagos');
        $auditor->givePermissionTo('modulo_reportes');
        $auditor->givePermissionTo('modulo_amenidades');
        $auditor->givePermissionTo('modulo_tablero');
        $auditor->givePermissionTo('modulo_mensajeria');

        //Asignar permisos al redidente
        $residente->givePermissionTo('modulo_pagos');
        $residente->givePermissionTo('modulo_reportes');
        $residente->givePermissionTo('modulo_amenidades');
        $residente->givePermissionTo('modulo_tablero');
        $residente->givePermissionTo('modulo_mensajeria');
    }
}
