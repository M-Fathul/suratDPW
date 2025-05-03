<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\suratmasukController;
use App\Http\Controllers\suratkeluarController;
use App\Http\Controllers\LampiranController;

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
    return view('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/dashboard/surat_masuk/tambah', [suratmasukController::class, 'create']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/disposisi', [suratmasukController::class, 'indexdisposisi']);
Route::get('/dashboard/disposisi/{id}/disposisi', [suratmasukController::class, 'disposisi']);





Route::get('/dashboard/surat_keluar/tambah', [suratkeluarController::class, 'create']);