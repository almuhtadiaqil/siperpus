<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\VisitorController;
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

Route::get('/', [AuthController::class, 'index']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('_login', [AuthController::class, '_login'])->name('_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware'=> ['auth']], function(){
    Route::group(['middleware'=> ['cek_login:super_admin']], function(){
        Route::get('superadmin', [SuperadminController::class, 'index'])->name('superadmin');
    });
    Route::group(['middleware'=> ['cek_login:visitor']], function(){
        Route::get('visitor', [VisitorController::class, 'index'])->name('visitor');
    });
});

Route::resource('superadmin', SuperadminController::class);
Route::resource('item', ItemController::class);
Route::resource('pemasukan', PemasukanController::class);
Route::resource('pengeluaran', PengeluaranController::class);
Route::resource('mutasi', MutasiController::class);
Route::resource('report', ReportController::class);
Route::get('/export_masuk',   [ReportController::class, 'export_pemasukan']);
Route::get('/export_keluar',   [ReportController::class, 'export_pengeluaran']);
