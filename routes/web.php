<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PaymentController;
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
    Route::get('/logout', 'logout')->name('auth.logout')->middleware('auth');
});



Route::get('/', [PelangganController::class, 'homepage'])->name('homepage');
Route::get('/jenis-tukang', [PelangganController::class, 'jenisTukang'])->name('jenis-tukang');
Route::get('/jenis-tukang/{idKeahlian}', [PelangganController::class, 'hasilPencarian'])->name('jenis-tukang.keahlian');

Route::get('/tentang', [PelangganController::class, 'tentang'])->name('tentang');
// Route::post('/payments', [PaymentController::class, 'store'])->name('payments');

Route::prefix('user')->controller(PelangganController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('pelanggan.dashboard');
    Route::get('/profile', 'profile')->name('pelanggan.profil')->middleware('auth');
    Route::post('/profile/update', 'updateProfile')->name('pelanggan.profil.update')->middleware('auth');
    Route::get('/sewa/riwayat', 'riwayatSewa')->name('pelanggan.riwayat')->middleware('auth');
    Route::post('/sewa/pengajuan', 'sewa')->name('pelanggan.sewa')->middleware('auth');
    Route::get('/checkout/{id}', 'checkout')->name('pembayaran.checkout')->middleware('auth');
    Route::post('/payment/webhook', 'webhook')->name('webhook');
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
    Route::get('/pengalaman/{id}', 'tampilPengalaman')->name('tukang.pengalaman.tampil')->middleware('auth:tukang');
    Route::post('/pengalaman/update/{id}', 'updatePengalaman')->name('tukang.pengalaman.update')->middleware('auth:tukang');
    Route::get('/pengalaman/delete/{id}', 'hapusPengalaman')->name('tukang.pengalaman.hapus')->middleware('auth:tukang');
    Route::get('/penyewaan/konfirmasi', 'konfirmasi')->name('tukang.penyewaan')->middleware('auth:tukang');
    Route::post('/penyewaan/update-status/{id}', 'updateStatus')->name('tukang.updateStatus')->middleware('auth:tukang');
    Route::get('/tukangs/kecamatans', 'tukangsByKecamatan')->name('tukangs.byKecamatan');
    // Route::get('/penyewaan/riwayat', 'riwayat')->name('tukang.riwayat')->middleware('tukang');
    Route::get('/logout', 'logout')->name('tukang.logout')->middleware('tukang');
    // Route::get('/dashboard', 'dashboard')->name('pelanggan.dashboard')->middleware('auth');
});
