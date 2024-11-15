<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangmasukController;

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




// /barangmasuk =>itu digunakan di a href=" " kalo view barangmasuk ngambil nama file nya
Route::get('/', [BarangController::class, 'index']);
Route::get('/barangkeluar', [BarangkeluarController::class, 'index']);
Route::get('/barangmasuk', [BarangmasukController::class, 'index']);

Route::get('/login', function () {
    return view('login', ['title' => 'Login']);
});

Route::get('/profil', function () {
    return view('profil', ['title' => 'Profil']);
});
