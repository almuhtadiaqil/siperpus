<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenerbitController;

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

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('petugas', [DashboardController::class, 'index'])->name('petugas');
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('book', BookController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
