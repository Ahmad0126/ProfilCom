<?php

use App\Http\Controllers\User;
use App\Http\Controllers\Kategori;
use App\Http\Controllers\Konten;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [User::class, 'login'])->name('user_login');

// profile route
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
// berita route
Route::get('/berita', function () {
    return view('berita');
})->name('berita');

Route::middleware('auth')->group(function () {
    Route::get('/user', [User::class, 'index'])->name('user');
    Route::post('/user/tambah', [User::class, 'store'])->name('user_tambah');
    Route::post('/user/edit', [User::class, 'edit'])->name('user_edit');
    Route::get('/user/hapus/{id?}', [User::class, 'hapus'])->name('user_hapus');

    Route::get('/kategori', [Kategori::class, 'index'])->name('kategori');
    Route::post('/kategori/tambah', [Kategori::class, 'store'])->name('kategori_tambah');
    Route::post('/kategori/edit', [Kategori::class, 'edit'])->name('kategori_edit');
    Route::get('/kategori/hapus/{id?}', [Kategori::class, 'hapus'])->name('kategori_hapus');
    
    Route::get('/konten', [Konten::class, 'index'])->name('konten');
    Route::post('/konten/store', [Konten::class, 'store'])->name('konten_store');
    Route::get('/konten/tambah', [Konten::class, 'tambah'])->name('konten_tambah');

    Route::post('/user/logout', [User::class, 'logout'])->name('user_logout');
});
