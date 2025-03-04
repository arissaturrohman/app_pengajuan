<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;

// login
Route::get('/',[AuthController::class, 'login'] )->name('login');
Route::post('/',[AuthController::class, 'loginProses'] )->name('loginProses');

Route::middleware('checkLogin')->group(function(){
    // dashboard
    Route::get('dashboard',[DashboardController::class, 'index'] )->name('dashboard');
    
    // nasabah
    Route::get('nasabah',[NasabahController::class, 'index'] )->name('nasabah');
    
    // kelompok
    Route::get('kelompok',[KelompokController::class, 'index'] )->name('kelompok');
    
    // pengajuan
    Route::get('pengajuan',[PengajuanController::class, 'index'] )->name('pengajuan');
});
