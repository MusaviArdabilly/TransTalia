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
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Auth\AuthController;

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
Route::get('/logo', [GuestController::class, 'logo']);

// ========================== Auth ==========================

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/post', [AuthController::class, 'postRegister']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login/post', [AuthController::class, 'postLogin']);

Route::get('/logout', [AuthController::class, 'logout']);

// ========================== User ===========================


Route::get('/reservasi', [UserController::class, 'reservation']);
Route::get('/riwayat-reservasi', [UserController::class, 'reservationHistory']);

Route::get('/edit-akun', [UserController::class, 'editAkun']);
Route::post('/edit-akun/post', [UserController::class, 'updateAkun']);

Route::get('/edit-password', [UserController::class, 'editPassword']);
Route::post('/edit-password/post', [UserController::class, 'updatePassword']);

// ========================== Admin ========================== 

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // ---------------------- Armada Bus ----------------------
    Route::prefix('armada-bus')->group(function () {
        Route::get('/', [ArmadaBusController::class, 'index']);
        Route::get('/tambah', [ArmadaBusController::class, 'add']);
        Route::post('/tambah/post', [ArmadaBusController::class, 'store']);
        Route::get('/ubah/{id}', [ArmadaBusController::class, 'edit']);
        Route::post('/ubah/{id}/post', [ArmadaBusController::class, 'update']);
        Route::get('/hapus/{id}', [ArmadaBusController::class, 'destroy']);
    });

    // -------------------- Kode Perawatan --------------------
    Route::prefix('kode-perawatan')->group(function () {
        Route::get('/', [KodePerawatanController::class, 'index']);
        Route::get('/tambah', [KodePerawatanController::class, 'add']);
        Route::get('/tambah-data', [KodePerawatanController::class, 'store']);
        Route::get('/ubah', [KodePerawatanController::class, 'edit']);
        Route::get('/ubah-data', [KodePerawatanController::class, 'update']);
    });
    
    // ------------------------ Pegawai ------------------------
    Route::prefix('pegawai')->group(function () {
        Route::get('/', [PegawaiController::class, 'index']);
        Route::get('/tambah', [PegawaiController::class, 'add']);
        Route::get('/tambah-data', [PegawaiController::class, 'store']);
        Route::get('/ubah', [PegawaiController::class, 'edit']);
        Route::get('/ubah-data', [PegawaiController::class, 'update']);
    });
    
    // ------------------------ Jadwal ------------------------
    Route::prefix('jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index']);
    });
    
    // ---------------------- Transaksi ----------------------
    Route::prefix('transaksi')->group(function () {
        Route::get('/', [TransaksiController::class, 'index']);
        Route::get('/tambah', [TransaksiController::class, 'add']);
        Route::get('/tambah-data', [TransaksiController::class, 'store']);
        Route::get('/ubah', [TransaksiController::class, 'edit']);
        Route::get('/ubah-data', [TransaksiController::class, 'update']);
    });
    
    // ------------------- Perawatan Armada -------------------
    Route::prefix('perawatan-armada')->group(function () {
        Route::get('/', [PerawatanArmadaController::class, 'index']);
        Route::get('/tambah', [PerawatanArmadaController::class, 'add']);
        Route::get('/tambah-data', [PerawatanArmadaController::class, 'store']);
        Route::get('/ubah', [PerawatanArmadaController::class, 'edit']);
        Route::get('/ubah-data', [PerawatanArmadaController::class, 'update']);
    });
    
    // ------------------- Pembaruan Armada -------------------
    Route::prefix('pembaruan-armada')->group(function () {
        Route::get('/', [PembaruanArmadaController::class, 'index']);
        Route::get('/tambah', [PembaruanArmadaController::class, 'add']);
        Route::get('/tambah-data', [PembaruanArmadaController::class, 'store']);
        Route::get('/ubah', [PembaruanArmadaController::class, 'edit']);
        Route::get('/ubah-data', [PembaruanArmadaController::class, 'update']);
    });
    
    // ------------------- Performa Pegawai -------------------
    Route::prefix('performa-pegawai')->group(function () {
        Route::get('/', [PerformaPegawaiController::class, 'index']);
        Route::get('/ubah', [PerformaPegawaiController::class, 'edit']);
        Route::get('/ubah-data', [PerformaPegawaiController::class, 'update']);
    });
});