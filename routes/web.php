<?php

use App\Http\Controllers\SuperadminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitorController;

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
