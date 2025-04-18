<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StockController extends Controller
{
    public function index()
    {
       
        $Id = session('karyawan_id');
        $produk = Produk::all();
        return view('stock', compact('produk', 'Id'));
        
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_produk' => 'required|unique:stok-produk,kode_produk',
        'nama_produk' => 'required',
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'stok' => 'required|integer|min:0',
        'harga' => 'required|numeric|min:0',
    ]);

    // dd($request->all());
    $karyawanId = session('karyawan_id'); // Ambil dari session

    // Upload gambar
    $imagePath = $request->file('foto')->store('gambar_produk', 'public');

    // Simpan data
    Produk::create([
        'produk_id' => (string) \Illuminate\Support\Str::uuid(),
        'karyawan_id' => $karyawanId,
        'kode_produk' => $request->kode_produk,
        'nama_produk' => $request->nama_produk,
        'foto' => $imagePath,
        'stok' => $request->stok,
        'harga' => $request->harga,
    ]);

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
}

public function update(Request $request, $produk_id)
{
    $request->validate([
        'produk_id' => 'required|exists:stok-produk,produk_id',
        'kode_produk' => 'required',
        'nama_produk' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'stok' => 'required|integer|min:0',
        'harga' => 'required|numeric|min:0',
    ]);

    $produk = Produk::findOrFail($produk_id);

    // Cek jika ada file foto baru yang diupload
    if ($request->hasFile('foto')) {
        // Simpan foto baru
        $imagePath = $request->file('foto')->store('gambar_produk', 'public');

        if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->foto = $imagePath;
    }

    // Update data produk
    $produk->kode_produk = $request->kode_produk;
    $produk->nama_produk = $request->nama_produk;
    $produk->stok = $request->stok;
    $produk->harga = $request->harga;

    $produk->save();

    return redirect()->back()->with('success', 'Produk berhasil diperbarui.');
}

   
    public function destroy($produk_id)
    {
        $produk = Produk::findOrFail($produk_id);
        $produk->delete();
    
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }


//=================================================== ADMIN =========================================================



    public function indexAdmin()
    {   
        $adminId = session('admin_id');
        $produk = Produk::all();
        return view('admin.kelola-stock.kelolaStock', compact('produk', 'adminId'));
    }

    public function storeProdukAdmin(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|unique:stok-produk,kode_produk',
            'nama_produk' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ]);
    
        // dd($request->all());
        $adminId = session('admin_id'); // Ambil dari session
    
        // Upload gambar
        $imagePath = $request->file('foto')->store('gambar_produk', 'public');
    
        // Simpan data
        Produk::create([
            'produk_id' => (string) \Illuminate\Support\Str::uuid(),
            'admin_id' => $adminId,
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'foto' => $imagePath,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);
    
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }

   

  

}
