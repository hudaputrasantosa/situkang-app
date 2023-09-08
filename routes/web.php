<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pelanggan\PelangganController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/store', 'store')->name('auth.register.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/authenticate', 'authenticate')->name('auth.login.process');
});


Route::controller(PelangganController::class)->group(function () {
    Route::get('/homepage', 'index')->name('pelanggan.homepage');
    Route::get('/dashboard', 'register')->name('auth.register');
});
