<?php

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
Route::view('/login', 'auth.login');
Route::view('/register', 'auth.register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth:web'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard');
});

Route::middleware(['auth:web', 'role_or_permission:admin'])->group(function () {
    Route::view('/dashboard', 'user.dashboard');
});
