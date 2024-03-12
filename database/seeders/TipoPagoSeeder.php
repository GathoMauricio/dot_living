<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoPago;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoPago::create([
            'nombre' => 'Depósito',
        ]);

        TipoPago::create([
            'nombre' => 'Renta',
        ]);
    }
}
