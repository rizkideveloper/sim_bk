<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasisPermasalahanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanMasalahController;
use App\Http\Controllers\PenangananMasalahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalikelasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login',[AuthController::class, 'authenticate']);
Route::post('/logout',[AuthController::class, 'logout']);

Route::middleware('auth')->group(function (){
    Route::get('/user-profile', [UserController::class,'profile'])->name('profile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::put('/user/changePassword',[UserController::class,'editPassword']);

    Route::middleware('admin')->group(function (){
        Route::resource('/user',UserController::class);
        Route::resource('/siswa',SiswaController::class);
        Route::resource('/jurusan',JurusanController::class);
        Route::resource('/walikelas',WalikelasController::class);
        Route::resource('/kelas',KelasController::class);
    });

    Route::middleware('BK')->group(function (){
        Route::resource('/basisPermasalahan',BasisPermasalahanController::class);

        Route::post('penangananMasalah/check_KategoriMasalah',[PenangananMasalahController::class,'check_KategoriMasalah']);
        Route::resource('/penangananMasalah',PenangananMasalahController::class);
    });

    Route::middleware('WaliKelas')->group(function (){
        Route::get('laporanMasalah/kirimLaporan/{id_laporan}/{id_siswa}',[LaporanMasalahController::class,'kirim_laporan']);

        Route::resource('/laporanMasalah',LaporanMasalahController::class);
    });
    
});

