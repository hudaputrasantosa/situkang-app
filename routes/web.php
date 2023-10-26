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

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/store', 'store')->name('auth.register.store');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/authenticate', 'authenticate')->name('auth.login.process');
    Route::post('/logout', 'logout')->name('auth.logout')->middleware('pelanggan');
});



Route::get('/', [PelangganController::class, 'homepage'])->name('homepage');
Route::get('/jenis', [PelangganController::class, 'jenis'])->name('jenis');
Route::get('/tentang', [PelangganController::class, 'tentang'])->name('tentang');

Route::controller(PelangganController::class)->middleware('auth')->group(function () {
    Route::get('/dashboard', 'dashboard')->name('pelanggan.dashboard');
    Route::get('/profil', 'profil')->name('pelanggan.profil');
    Route::post('/pengajuan-sewa', 'sewa')->name('pelanggan.sewa');
});

Route::prefix('tukang')->controller(TukangController::class)->group(function () {
    Route::get('/portofolio/{id}', 'portofolio')->name('tukang.portofolio');
    Route::get('/login', 'index')->name('tukang.login');
    Route::post('/authentication', 'authenticate')->name('tukang.authenticate');
    Route::get('/register', 'register')->name('tukang.register');
    Route::get('/getDesa', 'getDesa')->name('tukang.getDesa');
    Route::post('/registration-store', 'store')->name('tukang.store');
    Route::get('/dashboard', 'dashboard')->name('tukang.dashboard')->middleware('tukang');
    Route::get('/profile', 'profile')->name('tukang.profile')->middleware('auth:tukang');
    Route::post('/profile/update/{id}', 'profileUpdate')->name('tukang.profile.update')->middleware('auth:tukang');
    Route::get('/pengalaman', 'pengalaman')->name('tukang.pengalaman')->middleware('auth:tukang');
    Route::get('/pengalaman/tambah', 'tambahPengalaman')->name('tukang.pengalaman.tambah')->middleware('auth:tukang');
    Route::post('/pengalaman/store', 'storePengalaman')->name('tukang.pengalaman.store')->middleware('auth:tukang');
    Route::get('/penyewaan/konfirmasi', 'konfirmasi')->name('tukang.penyewaan')->middleware('auth:tukang');
    Route::post('/penyewaan/update-status/{id}', 'updateStatus')->name('tukang.updateStatus')->middleware('auth:tukang');
    // Route::get('/penyewaan/riwayat', 'riwayat')->name('tukang.riwayat')->middleware('tukang');
    Route::get('/logout', 'logout')->name('tukang.logout')->middleware('tukang');
    // Route::get('/dashboard', 'dashboard')->name('pelanggan.dashboard')->middleware('auth');
});
