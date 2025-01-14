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
            'username' => 'admin',
            'telp' => '111111111111',
            'jenis_kelamin' => 'l',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Bandung',
            'role' => 'admin',
            'password' => Hash::make('admin')
        ]);

        User::create([
            'name' => 'Dokter',
            'email' => 'dokter@gmail.com',
            'username' => 'dokter',
            'telp' => '222222222222',
            'jenis_kelamin' => 'p',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Bandung',
            'role' => 'dokter',
            'spesialis' => 'pu',
            'password' => Hash::make('admin')
        ]);

        User::create([
            'name' => 'Apoteker',
            'email' => 'apoteker@gmail.com',
            'username' => 'apoteker',
            'telp' => '333333333333',
            'jenis_kelamin' => 'l',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Bandung',
            'role' => 'apoteker',
            'password' => Hash::make('apoteker')
        ]);
    }
}
