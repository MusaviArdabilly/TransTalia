<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ArmadaBusController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\KodePerawatanController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\PembaruanArmadaController;
use App\Http\Controllers\Admin\PerawatanArmadaController;
use App\Http\Controllers\Admin\PerformaPegawaiController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\ReservasiController;
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

Route::get('/error-403', function(){
    return view('not-authorized');
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

Route::middleware('auth')->group(function () {
    // ========================== User ===========================
    
    Route::get('/edit-akun', [UserController::class, 'editAkun']);
    Route::post('/edit-akun/post', [UserController::class, 'updateAkun']);
    
    Route::get('/edit-password', [UserController::class, 'editPassword']);
    Route::post('/edit-password/post', [UserController::class, 'updatePassword']);
    
    Route::get('/reservasi', [UserController::class, 'reservation']);
    Route::post('/reservasi/check-bus', [UserController::class, 'reservationCheckBus']);
    Route::post('/reservasi/check-out', [UserController::class, 'reservationCheckOut']);
    Route::post('/reservasi/check-out/post', [UserController::class, 'reservationStore']);
    Route::get('/reservasi/riwayat', [UserController::class, 'reservationHistory']);
    
    // ========================== Admin ========================== 
    
    Route::prefix('admin')->middleware('admin_employee')->group(function () {
    
        Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin_employee');
        
        // ---------------------- Armada Bus ----------------------
        Route::prefix('armada-bus')->middleware('employee_restriction')->group(function () {
            Route::get('/', [ArmadaBusController::class, 'index']);
            Route::get('/tambah', [ArmadaBusController::class, 'add']);
            Route::post('/tambah/post', [ArmadaBusController::class, 'store']);
            Route::get('/ubah/{id}', [ArmadaBusController::class, 'edit']);
            Route::post('/ubah/{id}/post', [ArmadaBusController::class, 'update']);
            Route::get('/hapus/{id}', [ArmadaBusController::class, 'destroy']);
        });
    
        // -------------------- Kode Perawatan --------------------
        Route::prefix('kode-perawatan')->middleware('employee_restriction')->group(function () {
            Route::get('/', [KodePerawatanController::class, 'index']);
            Route::get('/tambah', [KodePerawatanController::class, 'add']);
            Route::post('/tambah/post', [KodePerawatanController::class, 'store']);
            Route::get('/ubah/{id}', [KodePerawatanController::class, 'edit']);
            Route::post('/ubah/{id}/post', [KodePerawatanController::class, 'update']);
            Route::get('/hapus/{id}', [KodePerawatanController::class, 'destroy']);
        });
        
        // ------------------------ Pegawai ------------------------
        Route::prefix('pegawai')->middleware('employee_restriction')->group(function () {
            Route::get('/', [PegawaiController::class, 'index']);
            Route::get('/tambah', [PegawaiController::class, 'add']);
            Route::post('/tambah/post', [PegawaiController::class, 'store']);
            Route::get('/ubah/{id}', [PegawaiController::class, 'edit']);
            Route::post('/ubah/{id}/post', [PegawaiController::class, 'update']);
            Route::get('/hapus/{id}', [PegawaiController::class, 'destroy']);
    
            Route::get('/tambah/districts', [PegawaiController::class, 'districts']);
            Route::get('/tambah/villages', [PegawaiController::class, 'villages']);
            Route::get('/ubah/{id}/districts', [PegawaiController::class, 'districts']);
            Route::get('/ubah/{id}/villages', [PegawaiController::class, 'villages']);
        });
        
        // ------------------------ Reservasi ------------------------
        Route::prefix('reservasi')->middleware('employee_restriction')->group(function () {
            Route::get('/', [ReservasiController::class, 'index']);
            Route::get('/ubah/{id}', [ReservasiController::class, 'edit']);
            Route::post('/ubah/{id}/post', [ReservasiController::class, 'update']);
            Route::get('/notifikasi', [ReservasiController::class, 'notifikasi']);
        });
        
        // ------------------------ Jadwal ------------------------
        Route::prefix('jadwal')->group(function () {
            Route::get('/', [JadwalController::class, 'index']);
        });
        
        // ---------------------- Transaksi ----------------------
        Route::prefix('transaksi')->middleware('employee_restriction')->group(function () {
            Route::get('/', [TransaksiController::class, 'index']);
            Route::get('/tambah', [TransaksiController::class, 'add']);
            Route::post('/tambah/post', [TransaksiController::class, 'store']);
            Route::get('/ubah/{id}', [TransaksiController::class, 'edit']);
            Route::post('/ubah/{id}/post', [TransaksiController::class, 'update']);
            Route::get('/hapus/{id}', [TransaksiController::class, 'destroy']);
        });
        
        // ------------------- Perawatan Armada -------------------
        Route::prefix('perawatan-armada')->group(function () {
            Route::get('/', [PerawatanArmadaController::class, 'index']);
            Route::get('/tambah', [PerawatanArmadaController::class, 'add']);
            Route::post('/tambah/post', [PerawatanArmadaController::class, 'store']);
            Route::get('/ubah/{id}', [PerawatanArmadaController::class, 'edit']);
            Route::post('/ubah/{id}/post', [PerawatanArmadaController::class, 'update']);
            Route::get('/hapus/{id}', [PerawatanArmadaController::class, 'destroy']);
        });
        
        // ------------------- Pembaruan Armada -------------------
        Route::prefix('pembaruan-armada')->group(function () {
            Route::get('/', [PembaruanArmadaController::class, 'index']);
            Route::get('/tambah', [PembaruanArmadaController::class, 'add']);
            Route::post('/tambah/post', [PembaruanArmadaController::class, 'store']);
            Route::get('/ubah/{id}', [PembaruanArmadaController::class, 'edit']);
            Route::post('/ubah/{id}/post', [PembaruanArmadaController::class, 'update']);
            Route::get('/hapus/{id}', [PembaruanArmadaController::class, 'destroy']);
        });
        
        // ------------------- Performa Pegawai -------------------
        Route::prefix('performa-pegawai')->middleware('employee_restriction')->group(function () {
            Route::get('/', [PerformaPegawaiController::class, 'index']);
            Route::get('/ubah/{id}', [PerformaPegawaiController::class, 'edit']);
            Route::post('/ubah/{id}/post', [PerformaPegawaiController::class, 'update']);
        });
    });
});