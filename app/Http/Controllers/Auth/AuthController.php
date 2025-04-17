<?php

namespace App\Http\Controllers\Auth;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('welcome'); // Pastikan Anda memiliki tampilan login
    }
    public function loginKaryawan(Request $request) // Pastikan metode ini ada
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $karyawan = Karyawan::where('email', $request->email)->first();

        if ($karyawan && Hash::check($request->password, $karyawan->password)) {
            // Simpan ID karyawan di session
            session(['karyawan_id' => $karyawan->karyawan_id]);

            return redirect()->route('stock')->with('success', 'Login berhasil!');
        }

        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function logoutKaryawan(Request $request)
    {
        // Hapus session karyawan_id
        $request->session()->forget('karyawan_id');
    
        // Atau kalau ingin menghapus semua session:
        // $request->session()->flush();
    
        // Redirect ke halaman utama
        return redirect('/')->with('success', 'Logout berhasil!');
    }
    
}
