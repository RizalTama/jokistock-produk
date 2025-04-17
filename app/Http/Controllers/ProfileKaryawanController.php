<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class ProfileKaryawanController extends Controller
{
    public function index()
    {
        $karyawanId = session('karyawan_id');
        $datakaryawan = Karyawan::find($karyawanId);
        
        return view('profile', compact('datakaryawan', 'karyawanId'));
    }
}
