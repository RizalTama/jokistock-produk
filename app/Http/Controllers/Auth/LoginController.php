<?php

namespace App\Http\Controllers\Auth;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login'); // Pastikan Anda memiliki tampilan login
    }
    public function loginKaryawan(Request $request) // Pastikan metode ini ada
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $karyawan = Karyawan::where('email', $request->email)->first();

        if ($karyawan && Hash::check($request->password, $karyawan->password)) {
            // Buat token 5 digit
            session()->put('karyawan_id', $karyawan->id);

           
            // Kirim email token

            // Redirect ke halaman input token
            return redirect()->route('dashboard')->with('success', 'Login berhasil. Silakan masukkan token yang telah dikirim ke email Anda.');
        }

        return redirect()->back()->with('error', 'Email atau password salah.');
    }
}
