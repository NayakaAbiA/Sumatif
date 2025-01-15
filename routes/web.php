<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KurikulumController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Proses login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Proses logout


Route::get('/dashboard/kurikulum', [KurikulumController::class, 'dashKurikulum'])->name('dashboard.kurikulum');
Route::get('/dashboard/guru', [GuruController::class, 'dashguru'])->name('dashboard.guru');
Route::get('/main', [KurikulumController::class, 'main'])->name('main');