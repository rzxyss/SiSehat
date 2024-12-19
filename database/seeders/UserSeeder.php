<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'password' => Hash::make('dokter'),
            'role' => 'dokter'
        ]);

        User::create([
            'name' => 'Apoteker',
            'email' => 'apoteker@gmail.com',
            'password' => Hash::make('apoteker'),
            'role' => 'apoteker'
        ]);

        User::create([
            'name' => 'Pasien',
            'email' => 'pasien@gmail.com',
            'password' => Hash::make('pasien'),
            'role' => 'pasien'
        ]);
    }
}
