<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoReporte;

class TipoReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoReporte::truncate();
        TipoReporte::create(['nombre' => 'Mantenimiento']);
    }
}
