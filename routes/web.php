<?php

use App\Http\Controllers\Produk32Controller;
use App\Http\Controllers\Produk3Controller;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\UjiCobaController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tampil/{nama?}', function($nama='Cosmos') {
    return "Halo Nama Saya Adalah $nama dan Saya Adalah Seorang Ultraman Yang Bertugas Menjaga Kedamaian Dunia";
})->where('nama','[A-Za-z]+');

Route::get('/index',function(){
    echo "<a href=".route('create').">Akses Route dengan nama</a>";
});

Route::get('/create',function(){
    echo "Route diakases menggunakan nama";
})->name('create');

Route::get('/hallo',[UjiCobaController::class,'index']);

Route::get('/view',[ProdukController::class,'index1']);

Route::get('/produk',[ProdukController::class,'index']);

Route::get('/show',[ProdukController::class,'show']);

Route::get('/query',[ProdukController::class, 'Query']);

Route::get('/read',[ProdukController::class, "Read_Eloquent"])->name('tampil');

Route::get('/insert',[ProdukController::class, "Insert_Eloquent"]);

Route::get('/update',[ProdukController::class, "Update_Eloquent"]);

Auth::routes(['verify' =>true]);

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('produk3', Produk32Controller::class);

Route::group(['middleware' => ['auth']], function() {
    Route::group(['middleware' => ['logincheck:admin']], function() {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['logincheck:pengguna']], function(){
        Route::resource('pengguna', PenggunaController::class);
    });
});