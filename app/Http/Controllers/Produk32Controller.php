<?php

namespace App\Http\Controllers;

use App\Models\Produk3;
use Illuminate\Http\Request;

class Produk32Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk=Produk3::all();

    return view('produk3', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createproduk3');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Produk3::create([
            'nama' => $request->nama_produk,
            'harga' => $request->harga
        ]);
    
        return redirect()->route('produk3.index')->with(['succes' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk3 $produk)
    {
        return view('editproduk3', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk3 $produk)
    {
        $produk->update([
            'nama' => $request->nama_produk,
            'harga' => $request->harga
        ]);
    
        return redirect()->route('produk3.index')->with(['succes' => 'Data Behasil DiUbah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk3 $produk)
    {
        $produk->delete();

        return redirect()->route('produk3.index')->with(['succes'=>'Data Berhasil Dihapus']);
    }
}
