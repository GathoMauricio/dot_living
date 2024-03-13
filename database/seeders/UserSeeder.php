<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $gatho = User::create([
            //'id' => 1,
            'name' => 'Gatho',
            'apaterno' => 'Baratho',
            'email' => 'mauricio2769@gmail.com',
            'telefono' => '5525233295',
            'foto' => 'perfil.png',
            'password' => bcrypt('12345678'),
        ]);
        $gatho->assignRole(['Super usuario', 'Residente']);

        $rene = User::create([
            // 'id' => 2,
            'name' => 'Rene',
            'apaterno' => 'Ortuno',
            'email' => 'rortuno@dotredes.com',
            'telefono' => '5565652521',
            'foto' => 'perfil.png',
            'password' => bcrypt('12345678'),
        ]);
        $rene->assignRole('Super usuario');
    }
}
