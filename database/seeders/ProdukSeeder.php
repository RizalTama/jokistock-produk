<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
DB::table('stok-produk')->insert([
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P001',
                'nama_produk' => 'Produk 1',
                'harga' => 10000,
                'stok' => 50,
                'foto' => 'produk1.jpg',
                'created_at' => now(),
               
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P002',
                'nama_produk' => 'Produk 2',
                'harga' => 20000,
                'stok' => 30,
                'foto' => 'produk2.jpg',
                'created_at' => now(),
            
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P003',
                'nama_produk' => 'Produk 3',
                'harga' => 15000,
                'stok' => 20,
                'foto' => 'produk3.jpg',
                'created_at' => now(),
                
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P004',
                'nama_produk' => 'Produk 4',
                'harga' => 25000,
                'stok' => 10,
                'foto' => 'produk4.jpg',
                'created_at' => now(),
                
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P005',
                'nama_produk' => 'Produk 5',
                'harga' => 30000,
                'stok' => 5,
                'foto' => 'produk5.jpg',
                'created_at' => now(),
                
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P006',
                'nama_produk' => 'Produk 6',
                'harga' => 12000,
                'stok' => 25,
                'foto' => 'produk6.jpg',
                'created_at' => now(),
                
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P007',
                'nama_produk' => 'Produk 7',
                'harga' => 18000,
                'stok' => 15,
                'foto' => 'produk7.jpg',
                'created_at' => now(),
                
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P008',
                'nama_produk' => 'Produk 8',
                'harga' => 22000,
                'stok' => 8,
                'foto' => 'produk8.jpg',
                'created_at' => now(),
                
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P009',
                'nama_produk' => 'Produk 9',
                'harga' => 19000,
                'stok' => 12,
                'foto' => 'produk9.jpg',
                'created_at' => now(),
                
            ],
            [
                'produk_id' => Str::uuid(),
                'kode_produk' => 'P010',
                'nama_produk' => 'Produk 10',
                'harga' => 16000,
                'stok' => 18,
                'foto' => 'produk10.jpg',
                'created_at' => now(),
                
            ],
        ]);
    }
    /**
     * Reverse the migrations.
     */
}
