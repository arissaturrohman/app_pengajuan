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
    Route::post('nasabah/update/{id}',[NasabahController::class, 'update'] )->name('nasabahUpdate');
    Route::delete('nasabah/no ga ondestroy/{id}',[NasabahController::class, 'destroy'] )->name('nasabahDestroy');
    
    // kelompok
    Route::get('kelompok',[KelompokController::class, 'index'] )->name('kelompok');
    Route::get('kelompok/create',[KelompokController::class, 'create'] )->name('kelompokCreate');
    Route::post('kelompok/store',[KelompokController::class, 'store'] )->name('kelompokStore');
    Route::get('kelompok/edit/{id}',[KelompokController::class, 'edit'] )->name('kelompokEdit');
    Route::post('kelompok/update/{id}',[KelompokController::class, 'update'] )->name('kelompokUpdate');
    Route::delete('kelompok/destroy/{id}',[KelompokController::class, 'destroy'] )->name('kelompokDestroy');
    
    // detail kelompok
    Route::get('detail/{id}',[DetailKelompokController::class, 'index'] )->name('detail');
    
    // pengajuan
    Route::get('pengajuan',[PengajuanController::class, 'index'] )->name('pengajuan');
    Route::get('pengajuan/create',[PengajuanController::class, 'create'] )->name('pengajuanCreate');
    Route::post('pengajuan/store',[PengajuanController::class, 'store'] )->name('pengajuanStore');
});
