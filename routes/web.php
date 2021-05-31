<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('_login', [AuthController::class, '_login'])->name('_login');

Route::group(['middleware'=> ['auth']], function(){
    Route::get('superadmin', [DashboardController::class, 'index'])->name('superadmin');
    Route::get('admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('visitor', [DashboardController::class, 'index'])->name('visitor');
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('item', ItemController::class);
    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::resource('mutasi', MutasiController::class);
    Route::resource('report', ReportController::class);
    Route::get('/export_pemasukan/{tgl_start}/{tgl_finish}',   [ReportController::class, 'export_pemasukan']);
    Route::get('/export_pengeluaran/{tgl_start}/{tgl_finish}',   [ReportController::class, 'export_pengeluaran']);
    Route::get('/export_mutasi/{tgl_start}/{tgl_finish}',   [ReportController::class, 'export_mutasi']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

