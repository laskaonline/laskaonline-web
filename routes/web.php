<?php

use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\ApproveDepositController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\ItemDepositController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WartelsuspasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

        Route::get('/manage-user', [\App\Http\Controllers\Admin\ManageUserController::class, 'index'])->name('manage-user.index');
        Route::post('/manage-user/store', [\App\Http\Controllers\Admin\ManageUserController::class, 'store'])->name('manage-user.store');

        Route::view('/item-deposit', 'admin.item_deposit')->name('item-deposit');
        Route::post('/item-deposit/{deposit}/approve', ApproveDepositController::class)->name('item-deposit.approve');

        Route::view('/queue', 'admin.queue_number')->name('queue');
        Route::resource('/wartelsuspas', WartelsuspasController::class);
        Route::resource('/guest-book', GuestBookController::class);
    });
    Route::view('/dashboard', 'user.dashboard')->name('dashboard');
    Route::resource('/appointment', AppointmentController::class);
    Route::get('/appointment/show', [\App\Http\Controllers\ItemDepositController::class, 'show'])->name('appointment.show');

    Route::resource('/item-deposit', ItemDepositController::class);
    Route::get('/item-deposit/show', [\App\Http\Controllers\ItemDepositController::class, 'show'])->name('item-deposit.show');
    Route::post('/item-deposit/store', [\App\Http\Controllers\ItemDepositController::class, 'store'])->name('item-deposit.store');

    Route::resource('/guest-book', GuestBookController::class);

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
