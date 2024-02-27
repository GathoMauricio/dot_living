<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gatho',
            'email' => 'mauricio2769@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        User::create([
            'name' => 'Rene',
            'email' => 'rortuno@dotredes.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
