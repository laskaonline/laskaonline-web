<?php

use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ApproveAppointmentController;
use App\Http\Controllers\ApproveDepositController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\ItemDepositController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WartelsuspasController;
use Illuminate\Support\Facades\Auth;
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
Route::view('/contact', 'contact');

Route::middleware(['honeypot'])->group(function () {
    Auth::routes([
        'reset' => false,
        'confirm' => false,
        'verify' => false
    ]);
});

//TODO: Remove this, this has security risk
Route::get('logout', [LoginController::class, 'logout']);

Route::middleware(['auth:web'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        // Dashboard Admin
        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        // Manejemen User
        Route::get('/manage-user', [ManageUserController::class, 'index'])->name('manage-user.index');
        Route::get('/manage-user/{admin}', [ManageUserController::class, 'show'])->name('manage-user.show');
        Route::get('/manage-user/visitor/{visitor}', [ManageUserController::class, 'visitor'])->name('manage-user.visitor');
        Route::post('/manage-user/store', [ManageUserController::class, 'store'])->name('manage-user.store');

        // Admin Penitipan Barang
        Route::resource('/item-deposit', ItemDepositController::class);
        Route::post('/item-deposit/{deposit}/approve', ApproveDepositController::class)->name('item-deposit.approve');

        // Admin Antrian
        Route::resource('/appointment', AppointmentController::class);

        // Admin Wartelsuspas
        Route::get('/wartelsuspas', [WartelsuspasController::class, 'index'])->name('wartelsuspas.index');
        Route::get('/wartelsuspas/create', [WartelsuspasController::class, 'create'])->name('wartelsuspas.create');
        Route::post('/wartelsuspas/store', [WartelsuspasController::class, 'store'])->name('wartelsuspas.store');
        Route::get('/wartelsuspas/{wartelsuspas}', [WartelsuspasController::class, 'show'])->name('wartelsuspas.show');

        // Admin Buku Tamu
        Route::resource('/guest-book', GuestBookController::class);
    });
    // Dashboard Visitor
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Antrian  Visitor
    Route::resource('/appointment', AppointmentController::class);
    Route::post('/appointment/{appointment}/approve', ApproveAppointmentController::class)->name('appointment.approve');

    // Penitipan Barang Visitor
    Route::resource('/item-deposit', ItemDepositController::class);

    // Profil Visitor
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->middleware(['honeypot'])->name('profile.update');
});

// Buku Tamu Public
Route::get('/guest-book', [GuestBookController::class, 'public'])->name('guest-book.public');
Route::post('/guest-book/store', [GuestBookController::class, 'store'])->name('guest-book.store');
