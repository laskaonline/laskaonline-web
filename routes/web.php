<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Auth::routes();

Route::middleware(['auth:web'])->group(function () {
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::view('/dashboard', 'admin.dashboard');
        Route::view('/manage-user', 'admin.manage_user');
        Route::view('/item-deposit', 'admin.item_deposit');
        Route::view('/queue-number', 'admin.queue_number');
        Route::view('/wartelsuspas', 'admin.wartelsuspas');
        Route::view('/guestbooks', 'admin.guest_books');
    });
    Route::view('/dashboard', 'user.dashboard');
    Route::view('/itemdeposit', 'user.item_deposit');
    Route::view('/queuenumber', 'user.queue_number');
    Route::view('/guestbooks', 'user.guest_books');
    Route::view('/profile', 'user.profile');
});
