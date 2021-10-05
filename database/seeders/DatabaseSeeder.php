<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Status::create([
            'name' => 'Pesanan Diterima'
        ]);

        Status::create([
            'name' => 'Sedang Diproses'
        ]);

        Status::create([
            'name' => 'Selesai'
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'alamat' => 'admin',
            'no_hp' => 'admin',
            'unit_mb' => 'admin',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Costumer',
            'email' => 'costumer@gmail.com',
            'alamat' => 'costumer',
            'no_hp' => 'costumer',
            'unit_mb' => 'costumer',
            'password' => bcrypt('12345678')
        ]);
    }
}
