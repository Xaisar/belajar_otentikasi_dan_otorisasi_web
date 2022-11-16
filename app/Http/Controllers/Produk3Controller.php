<?php

namespace App\Http\Controllers;

use App\Models\Produk3;
use Illuminate\Http\Request;

class Produk3Controller extends Controller
{
   public function index() {
    $produk=Produk3::all();

    return view('produk3', compact('produk'));
   }

   public function create(){
    
    return view('createproduk3');
   }

   public function edit(Produk3 $produk1){
    return view('editproduk3', compact('produk1'));
   }

   public function store(Request $request){
    Produk3::create([
        'nama' => $request->nama_produk,
        'harga' => $request->harga
    ]);

    return redirect()->route('produk3.index')->with(['succes' => 'Data Berhasil Disimpan']);
   }

   public function update(Request $request, Produk3 $produk2){
    $produk2->update([
        'nama' => $request->nama_produk,
        'harga' => $request->harga
    ]);

    return redirect()->route('produk3.index')->with(['succes' => 'Data Behasil DiUbah']);
   }

   public function destroy(Produk3 $produk3){
    $produk3->delete();

    return redirect()->route('produk3.index')->with(['succes'=>'Data Berhasil Dihapus']);
   }

}
