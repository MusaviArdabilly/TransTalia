<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ArmadaBusController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\jadwalController;
use App\Http\Controllers\Admin\KodePerawatanController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\PembaruanArmadaController;
use App\Http\Controllers\Admin\PerawatanArmadaController;
use App\Http\Controllers\Admin\PerformaPegawaiController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\AuthController;

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
    return view('guest.index');
});

// ========================== Guest ==========================

Route::get('/', [GuestController::class, 'index']);
Route::get('/profil', [GuestController::class, 'profil']);
Route::get('/jadwal', [GuestController::class, 'jadwal']);
Route::get('/masuk', [GuestController::class, 'login']);
Route::get('/daftar', [GuestController::class, 'register']);
Route::get('/logo', [GuestController::class, 'logo']);

// ========================== Auth ==========================

Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);

// ========================== User ===========================



// ========================== Admin ========================== 
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // ---------------------- Armada Bus ----------------------
    Route::prefix('armada_bus')->group(function () {
        Route::get('/', [ArmadaBusController::class, 'index']);
        Route::get('/tambah', [ArmadaBusController::class, 'add']);
        Route::get('/tambah_data', [ArmadaBusController::class, 'store']);
        Route::get('/ubah', [ArmadaBusController::class, 'edit']);
        Route::get('/ubah_data', [ArmadaBusController::class, 'update']);
    });

    // -------------------- Kode Perawatan --------------------
    Route::prefix('kode_perawatan')->group(function () {
        Route::get('/', [KodePerawatanController::class, 'index']);
        Route::get('/tambah', [KodePerawatanController::class, 'add']);
        Route::get('/tambah_data', [KodePerawatanController::class, 'store']);
        Route::get('/ubah', [KodePerawatanController::class, 'edit']);
        Route::get('/ubah_data', [KodePerawatanController::class, 'update']);
    });
    
    // ------------------------ Pegawai ------------------------
    Route::prefix('pegawai')->group(function () {
        Route::get('/', [PegawaiController::class, 'index']);
        Route::get('/tambah', [PegawaiController::class, 'add']);
        Route::get('/tambah_data', [PegawaiController::class, 'store']);
        Route::get('/ubah', [PegawaiController::class, 'edit']);
        Route::get('/ubah_data', [PegawaiController::class, 'update']);
    });
    
    // ------------------------ Jadwal ------------------------
    Route::prefix('jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index']);
    });
    
    // ---------------------- Transaksi ----------------------
    Route::prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index']);
        Route::get('/tambah', [TransaksiController::class, 'add']);
        Route::get('/tambah_data', [TransaksiController::class, 'store']);
        Route::get('/ubah', [TransaksiController::class, 'edit']);
        Route::get('/ubah_data', [TransaksiController::class, 'update']);
    });
    
    // ------------------- Perawatan Armada -------------------
    Route::prefix('perawatan_armada')->group(function () {
        Route::get('/', [PerawatanArmadaController::class, 'index']);
        Route::get('/tambah', [PerawatanArmadaController::class, 'add']);
        Route::get('/tambah_data', [PerawatanArmadaController::class, 'store']);
        Route::get('/ubah', [PerawatanArmadaController::class, 'edit']);
        Route::get('/ubah_data', [PerawatanArmadaController::class, 'update']);
    });
    
    // ------------------- Pembaruan Armada -------------------
    Route::prefix('pembaruan_armada')->group(function () {
        Route::get('/', [PembaruanArmadaController::class, 'index']);
        Route::get('/tambah', [PembaruanArmadaController::class, 'add']);
        Route::get('/tambah_data', [PembaruanArmadaController::class, 'store']);
        Route::get('/ubah', [PembaruanArmadaController::class, 'edit']);
        Route::get('/ubah_data', [PembaruanArmadaController::class, 'update']);
    });
    
    // ------------------- Performa Pegawai -------------------
    Route::prefix('performa_pegawai')->group(function () {
        Route::get('/', [PerformaPegawaiController::class, 'index']);
        Route::get('/ubah', [PerformaPegawaiController::class, 'edit']);
        Route::get('/ubah_data', [PerformaPegawaiController::class, 'update']);
    });
});