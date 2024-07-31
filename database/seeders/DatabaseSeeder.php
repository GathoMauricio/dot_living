<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PermisoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ResidenciaSeeder::class);
        $this->call(TipoPagoSeeder::class);
        $this->call(EstatusPagoSeeder::class);
        $this->call(PagoSeeder::class);
        $this->call(PermisoPagoSeeder::class);
        $this->call(PermisoAmenidadSeeder::class);
        $this->call(TipoMasEstatusAmenidadSeeder::class);
    }
}
