<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index() {
        $produk =['Aqua 115ml','Soda Gembira','Novel Cinta','GPU','Obligasi'];
        return view('produk',['produk'=>$produk]);
    }

    public function show() {
        $produk =['Aqua 115ml','Soda Gembira','Novel Cinta','GPU','Obligasi'];
        return view('show',['produk'=>$produk]);
    }

    public function index1() {
        // $produk = 'Aqua 1 Liter';
        // return view('produk1',['produk'=>$produk]);
        return view('produk1');
    }

    public function Query(){
        $produk= DB::table('produk')->get();

        return view('query',['produk'=>$produk]);
    }

    public function Read_Eloquent(){
        $produk1 = kategori::all();

        return view('eloquent',['produk1'=>$produk1]);
    }

    public function Insert_Eloquent(){
        kategori::create(['nama'=>"Bahan Bangunan","harga"=>"1000"]);

        return redirect()->Route('tampil');
    }

    public function Update_Eloquent(){
        kategori::where('id',5)->update(['harga'=>"500"]);

        return redirect()->Route('tampil');
    }

}
