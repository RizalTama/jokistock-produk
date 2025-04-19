<?php

namespace App\Http\Controllers\Auth;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
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

            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
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


    // ======================================   ADMIN   ========================================
    

    public function indexAdmin()
    {
        return view('admin.login'); // Pastikan Anda memiliki tampilan login admin
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Simpan ID admin di session
            session(['admin_id' => $admin->admin_id]);

            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function logoutAdmin(Request $request)
    {
        // Hapus session admin_id
        $request->session()->forget('admin_id');    
    
        // Atau kalau ingin menghapus semua session:
        // $request->session()->flush();
    
        // Redirect ke halaman utama
        return redirect('/admin/login')->with('success', 'Logout berhasil!');
    }
}
