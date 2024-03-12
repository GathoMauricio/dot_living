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
        EstatusPago::create([
            'nombre' => 'Pendiente',
        ]);
        EstatusPago::create([
            'nombre' => 'Aprobado',
        ]);
    }
}
