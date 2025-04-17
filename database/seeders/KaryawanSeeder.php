<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Karyawan::create([
            'karyawan_id' => Str::uuid(),
            'nama' => 'Rizal',
            'email' => 'rizal@example.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Raya No. 1',
            'foto' => 'foto.jpg',
            'foto-sampul' => 'sampul.jpg',
        ]);
    }
}
