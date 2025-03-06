<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DetailKelompokController;

// login
Route::get('/',[AuthController::class, 'login'] )->name('login');
Route::post('login',[AuthController::class, 'loginProses'] )->name('loginProses');

// logout
Route::get('logout',[AuthController::class, 'logout'] )->name('logout');

Route::middleware('checkLogin')->group(function(){
    // dashboard
    Route::get('dashboard',[DashboardController::class, 'index'] )->name('dashboard');
    
    // nasabah
    Route::get('nasabah',[NasabahController::class, 'index'] )->name('nasabah');
    Route::get('nasabah/create',[NasabahController::class, 'create'] )->name('nasabahCreate');
    Route::post('nasabah/store',[NasabahController::class, 'store'] )->name('nasabahStore');
    Route::get('nasabah/edit/{id}',[NasabahController::class, 'edit'] )->name('nasabahEdit');
    
    // kelompok
    Route::get('kelompok',[KelompokController::class, 'index'] )->name('kelompok');

    // detail kelompok
    Route::get('detail',[DetailKelompokController::class, 'index'] )->name('detail');
    
    // pengajuan
    Route::get('pengajuan',[PengajuanController::class, 'index'] )->name('pengajuan');
});
