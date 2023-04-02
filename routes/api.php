<?php

use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\ApproveAppointmentController;
use App\Http\Controllers\API\ApproveDepositController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\GuestBookController;
use App\Http\Controllers\API\ItemDepositController;
use App\Http\Controllers\API\ManageUserController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\WartelsuspasController;
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

Route::post('login', [LoginController::class, 'store']);
Route::post('register', [RegisterController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware(['role:admin|superior'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [ManageUserController::class, 'index']);
        Route::post('/users', [ManageUserController::class, 'store']);
    });

    Route::apiResource('appointments', AppointmentController::class);
    Route::apiResource('guest-books', GuestBookController::class);
    Route::apiResource('item-deposits', ItemDepositController::class);
    Route::apiResource('wartelsuspas', WartelsuspasController::class);

    Route::post('/item-deposits/{deposit}/approve', ApproveDepositController::class)->name('item-deposits.approve');
    Route::post('/appointments/{appointment}/approve', ApproveAppointmentController::class)->name('appointment.approve');

    Route::get('/user', [UserController::class, 'show']);
    Route::put('/user', [UserController::class, 'update']);
});
