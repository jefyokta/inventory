<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Barang::factory(10)->create();
        User::insert([
            [
                'name' => 'jefyokta',
                'role' => 'karyawan',
                'email' => 'jefyokta50@gmail.com',
                'password' => Hash::make('jepiokta')
            ],
            // [
            //     'name' => 'jefyokta',
            //     'role' => 'petugas',
            //     'email' => 'jefyokta2@gmail.com',
            //     'password' => Hash::make('jepiokta')
            // ],
            // [
            //     'name' => 'jefyokta',
            //     'role' => 'gudang',
            //     'email' => 'jefyokta3@gmail.com',
            //     'password' => Hash::make('jepiokta')
            // ],



        ]);
    }
}
