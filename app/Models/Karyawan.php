<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'karyawan_id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'karyawan_id',
        'nama',
        'email',
        'password',
        'no_hp',
        'alamat',
        'foto',
        'foto-sampul',
    ];
}
