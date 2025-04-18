<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert ([
            'admin_id' => Str::uuid(),
            'nama' => 'Admin Judol Gacor 987',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Raya No. 1, Kota Bandung, Jawa Barat, Indonesia, 40123',
            'foto' => 'foto.jpg',
            'foto-sampul' => 'sampul.jpg',
        ]);
    }
}
