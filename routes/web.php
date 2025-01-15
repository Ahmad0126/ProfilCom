<?php

use App\Http\Controllers\User;
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

Route::middleware('auth')->group(function () {
    Route::get('/user', [User::class, 'index'])->name('user');
    Route::post('/user/tambah', [User::class, 'store'])->name('user_tambah');
    Route::post('/user/edit', [User::class, 'edit'])->name('user_edit');
    Route::get('/user/hapus/{id?}', [User::class, 'hapus'])->name('user_hapus');

    Route::post('/user/logout', [User::class, 'logout'])->name('user_logout');
});
