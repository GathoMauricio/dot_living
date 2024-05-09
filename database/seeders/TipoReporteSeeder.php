<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoReporte;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TipoReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'modulo_tipo_reporte']);

        $super_usuario = Role::where('name', 'Super usuario')->first();
        $administrador = Role::where('name', 'Administrador')->first();

        $super_usuario->givePermissionTo('modulo_tipo_reporte');
        $administrador->givePermissionTo('modulo_tipo_reporte');

        TipoReporte::truncate();
        TipoReporte::create(['nombre' => 'Mantenimiento']);
    }
}
