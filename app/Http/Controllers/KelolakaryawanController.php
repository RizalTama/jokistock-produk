<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KelolakaryawanController extends Controller
{
    public function index()
    {
        $adminId = session('admin_id');
        if (!$adminId) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }
        $karyawan = Karyawan::all();
        $dataAdmin = Admin::find($adminId);
        return view('admin.kelola-karyawan.karyawan', compact('adminId', 'dataAdmin', 'karyawan'));
    }
    
    public function storeKaryawan(Request $request)
{
    // Validasi input
    $request->validate([
        'nama'        => 'required|string',
        'email'       => 'required|email|unique:karyawan,email',
        'password'    => 'required|string|min:6',
        'no_hp'       => 'required|string',
        'alamat'      => 'required|string',
        'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = $request->file('foto')->store('gambar_karyawan', 'public');

   
    Karyawan::create([
        'karyawan_id' => (string) \Illuminate\Support\Str::uuid(),
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
        'foto' => $imagePath,
    ]);


    return redirect()->back()->with('success', 'Karyawan berhasil ditambahkan.');
}

    public function updateKaryawan(Request $request, $karyawan_id)
    {
        // Validasi input
        $request->validate([
            'nama'        => 'required|string',
            'email' => 'required|email|unique:karyawan,email,' . $karyawan_id . ',karyawan_id',
            'no_hp'       => 'required|string',
            'alamat'      => 'required|string',
            'password'    => 'nullable|string|min:8',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $karyawan = Karyawan::findOrFail($karyawan_id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($karyawan->foto) {
                Storage::disk('public')->delete($karyawan->foto);
            }
            $imagePath = $request->file('foto')->store('gambar_karyawan', 'public');
            $karyawan->foto = $imagePath;
        }

        $karyawan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'password' => $request->password ? Hash::make($request->password) : $karyawan->password,
        ]);

        return redirect()->back()->with('success', 'Karyawan berhasil diperbarui.');
    }
    public function destroy($karyawan_id)
    {
        $produk = Karyawan::findOrFail($karyawan_id);
        $produk->delete();
    
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }





}
