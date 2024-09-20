<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstatusPago;

class EstatusPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstatusPago::truncate();
        EstatusPago::create([
            'nombre' => 'Pendiente de revición',
        ]);
        EstatusPago::create([
            'nombre' => 'Aprobado',
        ]);
        EstatusPago::create([
            'nombre' => 'Comprobante ilegible',
        ]);
    }
}
