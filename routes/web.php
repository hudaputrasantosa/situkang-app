<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pelanggan\PelangganController;
use App\Http\Controllers\Tukang\TukangController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/store', 'store')->name('auth.register.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/authenticate', 'authenticate')->name('auth.login.process');
    Route::post('/logout', 'logout')->name('auth.logout');
});



Route::get('/', [PelangganController::class, 'homepage'])->name('homepage');
Route::get('/jenis', [PelangganController::class, 'jenis'])->name('jenis');
Route::get('/tentang', [PelangganController::class, 'tentang'])->name('tentang');

Route::controller(PelangganController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('pelanggan.dashboard');
    Route::get('/profil', 'profil')->name('pelanggan.profil');
});

Route::prefix('tukang')->controller(TukangController::class)->group(function () {
    Route::get('/login', 'index')->name('tukang.login');
    Route::get('/register', 'register')->name('tukang.register');
    Route::get('/dashboard', 'dashboard')->name('pelanggan.dashboard')->middleware('auth');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
