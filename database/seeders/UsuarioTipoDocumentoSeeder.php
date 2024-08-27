<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UsuarioTipoDocumento;

class UsuarioTipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UsuarioTipoDocumento::create(['tipo' => 'Identificación']);
        UsuarioTipoDocumento::create(['tipo' => 'Referencia personal']);
        UsuarioTipoDocumento::create(['tipo' => 'Comprobante de trabajo']);
    }
}
