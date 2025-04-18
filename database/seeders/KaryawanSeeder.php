<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('karyawan')->insert([
                      [
                        'karyawan_id' => Str::uuid(),
                        'nama' => 'Karyawan 1',
                        'email' => 'karyawan1@example.com',
                        'password' => Hash::make('password'),
                        'no_hp' => '08123456789',
                        'alamat' => 'Jl. Raya No. 1, Kota Bandung, Jawa Barat, Indonesia, 40123',
                        'foto' => 'foto.jpg',
                        'foto-sampul' => 'sampul.jpg',
                    ],
                    [
                        'karyawan_id' => Str::uuid(),
                        'nama' => 'Karyawan 2',
                        'email' => 'karyawan2@example.com',
                        'password' => Hash::make('password'),
                        'no_hp' => '08123456789',
                        'alamat' => 'Jl. Raya No. 1, Kota Bandung, Jawa Barat, Indonesia, 40123',
                        'foto' => 'foto.jpg',
                        'foto-sampul' => 'sampul.jpg',
                    ],
                    [
                        'karyawan_id' => Str::uuid(),
                        'nama' => 'Karyawan 3',
                        'email' => 'karyawan3@example.com',
                        'password' => Hash::make('password'),
                        'no_hp' => '08123456789',   
                        'alamat' => 'Jl. Raya No. 1, Kota Bandung, Jawa Barat, Indonesia, 40123',
                        'foto' => 'foto.jpg',
                        'foto-sampul' => 'sampul.jpg',
                    ]
                    ]);
                }
    }

