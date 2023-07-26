<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;

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





Route::middleware('guest')->name('login')->prefix('login')->group(function () {
    // return view('user.login');
    Route::get('/', [LoginController::class, 'create']);

    Route::post('/', [LoginController::class, 'authenticate']);

});

Route::name('logout')->get('/logout', [UserController::class, 'logout']);

Route::middleware('guest')->name('register')->prefix('register')->group(function () {

    Route::get('/', [RegistrationController::class, 'create']);
    Route::post('/', [RegistrationController::class, 'store']);
});