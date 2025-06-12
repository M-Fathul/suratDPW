<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\suratmasukController;
use App\Http\Controllers\suratkeluarController;
use App\Http\Controllers\LampiranController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/surat_masuk/store', [suratmasukController::class, 'store']);
Route::get('/surat-masuk', [SuratmasukController::class, 'apiIndex']);
Route::get('/dashboard/surat_masuk/{id}/edit', [suratmasukController::class, 'edit']);
Route::put('/dashboard/surat_masuk/{id}', [suratmasukController::class, 'update']);
Route::delete('/dashboard/surat_masuk/{id}', [suratmasukController::class, 'destroy']);
Route::put('/dashboard/disposisi/{id}', [suratmasukController::class, 'updatedisposisi']);

Route::get('/surat_keluar', [suratkeluarController::class, 'apiindex']);
Route::post('/dashboard/surat_keluar/store', [suratkeluarController::class, 'store']);
Route::get('/dashboard/surat_keluar/{id}/edit', [suratkeluarController::class, 'edit']);
Route::put('/dashboard/surat_keluar/{id}', [suratkeluarController::class, 'update']);
Route::delete('/dashboard/surat_keluar/{id}', [suratkeluarController::class, 'destroy']);

Route::get('/dashboard/Lampiran_keluar', [LampiranController::class, 'keluar']);