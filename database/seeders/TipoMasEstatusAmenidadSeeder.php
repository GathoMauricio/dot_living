<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoAmenidad;
use App\Models\EstatusAmenidad;

class TipoMasEstatusAmenidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoAmenidad::create(['nombre' => 'Reunión']);
        TipoAmenidad::create(['nombre' => 'Visita']);

        EstatusAmenidad::create(['nombre' => 'Pendiente']);
        EstatusAmenidad::create(['nombre' => 'Aceptado']);
        EstatusAmenidad::create(['nombre' => 'Declinado']);
    }
}
