<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoFotoUsuarioHabitacion;

class UsuarioHabitacionTipoFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoFotoUsuarioHabitacion::create(['tipo' => 'Recepción']);
        TipoFotoUsuarioHabitacion::create(['tipo' => 'Entrega']);
    }
}
