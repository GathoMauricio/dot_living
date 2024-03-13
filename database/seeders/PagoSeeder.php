<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pago;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pago::truncate();
        Pago::create([
            'estatus_id' => 1,
            'residente_id' => 1,
            'tipo_id' => 1,
            'comprobante' => null,
            'descripcion' => 'Deposito para la habitació X enla residencia Y',
            'fecha' => '2024-03-16',
            'cantidad' => 2500,
        ]);
        Pago::create([
            'estatus_id' => 1,
            'residente_id' => 1,
            'tipo_id' => 2,
            'comprobante' => null,
            'descripcion' => 'Renta correspondiente al mes de MArzo del 2024',
            'fecha' => '2024-03-16',
            'cantidad' => 2500,
        ]);
    }
}
