<?php

use Illuminate\Support\Facades\Route;

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


// ROUTE PARAMETER
Route::get('/hello/{name}', function($name) {
    return "hi $name";
});

Route::get('/barang/{jenis}/{barang}', function($a, $b) {
    return "$a $b";
});


// OPSIONAL ROUTE
Route::get('/bio/{nama?}/{umur?}/', function( $nama = 'rama', $umur = '20' ) {
    return "halo $nama, umur saya $umur tahun";
});


// ROUTE DENGAN REGULER EXPRESSION
Route::get('/mobil/{id}', function( $id ) {
    return "mobil dengan id = $id";
})->where('id', '[0-9]+');



// ROUTE GROUP
Route::prefix('/admin')->group(function() {
    Route::get('/mahasiswa', function() {
        return 'mahasiswa';
    });
    Route::get('/dosen', function() {
        return 'dosen';
    });
});


// ROUTE REDIRECT
Route::redirect('/data-diri', '/bio');



// ROUTE FALLBACK
Route::fallback(function() {
    return "maaf halaman tidak ada";
});



// ROUTE PRIORITY
Route::get('/buku/{a}', function($a) {
    return "buku ke-$a";
});
Route::get('/buku/{b}', function($b) {
    return "buku ke-$b";
});
Route::get('/buku/{a}', function($a) {
    return "buku ke-$a";
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');