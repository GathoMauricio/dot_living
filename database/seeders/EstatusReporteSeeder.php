<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstatusReporte;

class EstatusReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstatusReporte::truncate();
        EstatusReporte::create(['nombre' => 'Pendiente']);
        EstatusReporte::create(['nombre' => 'En proceso']);
        EstatusReporte::create(['nombre' => 'Archivado']);
    }
}
