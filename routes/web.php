<?php

use App\Http\Controllers\Home;
use App\Http\Controllers\User;
use App\Http\Controllers\Kategori;
use App\Http\Controllers\Sosmed;
use App\Http\Controllers\Konfigurasi;
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

Route::get('/', [Home::class, 'index'])->name('base');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [User::class, 'login'])->name('user_login');

// profile route
Route::get('/profile', [Home::class, 'profile'])->name('profile');
// berita route
Route::get('/berita', [Home::class, 'berita'])->name('berita');
Route::get('/berita/kategori/{nama?}', [Home::class, 'kategori'])->name('berita_kategori');
Route::get('/berita/{slug?}', [Home::class, 'detail'])->name('berita_detail');

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
    Route::get('/konten/tambah', [Konten::class, 'tambah'])->name('konten_tambah');
    Route::get('/konten/edit/{id?}', [Konten::class, 'edit'])->name('konten_edit');
    Route::get('/konten/hapus/{id?}', [Konten::class, 'hapus'])->name('konten_hapus');
    Route::post('/konten/store', [Konten::class, 'store'])->name('konten_store');
    Route::post('/konten/change', [Konten::class, 'change'])->name('konten_change');

    Route::get('/sosmed', [Sosmed::class, 'index'])->name('sosmed');
    Route::post('/sosmed/tambah', [Sosmed::class, 'store'])->name('sosmed_tambah');
    Route::post('/sosmed/edit', [Sosmed::class, 'edit'])->name('sosmed_edit');
    Route::get('/sosmed/hapus/{id?}', [Sosmed::class, 'hapus'])->name('sosmed_hapus');

    // konfigurasi route
    Route::get('/konfigurasi', [Konfigurasi::class, 'index'])->name('konfigurasi');
    Route::post('/konfigurasi/update', [Konfigurasi::class, 'update'])->name('konfigurasi_update');

    Route::post('/user/logout', [User::class, 'logout'])->name('user_logout');
});
