<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $stokProduk = Produk::with(['karyawan','admin'])->get();
        // foreach ($stokProduk as $produk) {
        //     if ($produk->admin) {
        //         $penambah = $produk->admin->nama; // jika ditambahkan admin
        //     } elseif ($produk->karyawan) {
        //         $penambah = $produk->karyawan->nama; // jika ditambahkan karyawan
        //     } else {
        //         $penambah = 'Tidak diketahui';
        //     }
        
        //     echo "Produk: $produk->nama_produk ditambahkan oleh: $penambah <br>";
        // }
        $produk = Produk::all();
        $produkSeminggu = Produk::whereBetween('created_at', [now()->subWeek(), now()])
         ->with(['admin', 'karyawan']) // load relasi
        ->get();
        // dd($produkSeminggu);
        $produkHariIni = Produk::whereDate('created_at', Carbon::today())->get();
        //dd($produkSeminggu);
        // dd($produkHariIni);
        return view('admin.dashboard.dashboard', compact('produk', 'produkHariIni', 'produkSeminggu', 'stokProduk'));
     
    }

    public function indexKaryawan()
    {
        $stokProduk = Produk::with(['karyawan','admin'])->get();
        $produk = Produk::all();
        $produkSeminggu = Produk::whereBetween('created_at', [now()->subWeek(), now()])
         ->with(['admin', 'karyawan']) // load relasi
        ->get();
        // dd($produkSeminggu);
        $produkHariIni = Produk::whereDate('created_at', Carbon::today())->get();
        $Id = session('karyawan_id');
        $produk = Produk::all();
        return view('dashboard', compact('produk', 'Id', 'produkHariIni', 'produkSeminggu', 'stokProduk'));
    }
}
