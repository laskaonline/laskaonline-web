<?php

use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware(['role:admin|superior'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', function (Request $request) {
            return User::all();
        });
    });

    Route::apiResource('appointments', AppointmentController::class);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/user', function (Request $request) {
        //Update User here
        return $request->user();
    });


});

