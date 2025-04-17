<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
       
        $Id = session('karyawan_id');
        $produk = Produk::all();
        return view('stock', compact('produk', 'Id'));
        
    }

    public function tambahProduk()
    {
      //  return view('admin.kelola-stock.create');
    }
    public function editProduk()
    {
     //   return view('admin.kelola-stock.edit');
    }
    public function tampilProduk()
    {
       // return view('admin.kelola-stock.show');
    }
    public function destroy($produk_id)
    {
        $produk = Produk::findOrFail($produk_id);
        $produk->delete();
    
        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
