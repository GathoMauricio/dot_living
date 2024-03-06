<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Residencia;
use App\Models\Habitacion;

class ResidenciaSeeder extends Seeder
{
    public function run()
    {
        $mansio_foster = Residencia::create([
            'auditor_id' => 1,
            'nombre' => 'Mansión Foster',
            'telefono' => '5598525487',
            'email' => 'mfoster@mail.com',
            'direccion' => '1123 Wilson Way Falkland Islands',
        ]);

        Habitacion::create([
            'residencia_id' => $mansio_foster->id,
            'residente_id' => 1,
            'alias' => '001',
            'medidas' => '4 x 8',
            'renta' => '2500',
            'deposito' => '2500',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
        Habitacion::create([
            'residencia_id' => $mansio_foster->id,
            'alias' => '002',
            'medidas' => '4 x 4',
            'renta' => '2200',
            'deposito' => '2200',
            'descripcion' => 'Sed vulputate mattis nibh dapibus dignissim.',
        ]);
        Habitacion::create([
            'residencia_id' => $mansio_foster->id,
            'alias' => '003',
            'medidas' => '8 x 8',
            'renta' => '3000',
            'deposito' => '3000',
            'descripcion' => 'Maecenas sit amet est tortor. Maecenas porta interdum sapien quis sollicitudin.',
        ]);

        $casa_dibujos = Residencia::create([
            'auditor_id' => 2,
            'nombre' => 'La casa de los dibujos',
            'telefono' => '5587895425',
            'email' => 'cdibujos@mail.com',
            'direccion' => '8888 Cummings Vista Apt. 101, Susanbury, NY 95473',
        ]);

        Habitacion::create([
            'residencia_id' => $casa_dibujos->id,
            'alias' => 'P1H1',
            'medidas' => '4 x 8',
            'renta' => '2100',
            'deposito' => '2100',
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
        Habitacion::create([
            'residencia_id' => $casa_dibujos->id,
            'alias' => 'P1H2',
            'medidas' => '6 x 4',
            'renta' => '2800',
            'deposito' => '2800',
            'descripcion' => 'Sed vulputate mattis nibh dapibus dignissim.',
        ]);
        Habitacion::create([
            'residencia_id' => $casa_dibujos->id,
            'alias' => 'P3H1',
            'medidas' => '8 x 8',
            'renta' => '3500',
            'deposito' => '3500',
            'descripcion' => 'Maecenas sit amet est tortor. Maecenas porta interdum sapien quis sollicitudin.',
        ]);
    }
}
