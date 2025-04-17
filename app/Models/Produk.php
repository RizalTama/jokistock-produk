<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'stok-produk';
    protected $primaryKey = 'produk_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'produk_id',
        'kode_produk',
        'nama_produk',
        'jumlah',
        'harga',
        'foto',
    ];
}
