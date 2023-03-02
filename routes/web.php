<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\KunjunganController;
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

Route::view('/', 'home');

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);

Route::get('logout', [LoginController::class, 'logout']);

Route::middleware(['auth:web'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::view('/manage-user', 'admin.manage_user')->name('manage-user');
        Route::view('/titip-barang', 'admin.item_deposit')->name('titip-barang');
        Route::view('/antrian', 'admin.queue_number')->name('antrian');
        Route::view('/wartelsuspas', 'admin.wartelsuspas')->name('wartelsuspas');
        Route::view('/buku-tamu', 'admin.guest_books')->name('buku-tamu');
    });
    Route::view('/dashboard', 'user.dashboard')->name('dashboard');
    Route::view('/titip-barang', 'user.titip-barang')->name('titip-barang');
    Route::resource('kunjungan', KunjunganController::class);
    Route::view('/buku-tamu', 'user.buku-tamu')->name('buku-tamu');
    Route::view('/profile', 'user.profile')->name('profile');
});
