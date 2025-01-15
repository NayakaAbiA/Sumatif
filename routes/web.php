<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\UploadKisiController;
use App\Models\UploadKisi;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Proses login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Proses logout


Route::get('/dashboard/kurikulum', [KurikulumController::class, 'dashKurikulum'])->name('dashboard.kurikulum');

Route::get('/upload/kurikulum', [UploadKisiController::class, 'index'])->name('upload.kurikulum');
Route::get('/upload-kisi/create/kurikulum', [UploadKisiController::class, 'create'])->name('upload.create.kurikulum');
Route::post('/upload-kisi/store/kurikulum', [UploadKisiController::class, 'store'])->name('upload.store.kurikulum');

Route::get('/kisi-kisi/kurikulum', [KurikulumController::class, 'kisiKurikulum'])->name('kisi.kurikulum');
Route::get('/daftarhadir/kurikulum', [KurikulumController::class, 'dftrHadirKurikulum'])->name('daftarhadir.kurikulum');


Route::get('/dashboard/guru', [GuruController::class, 'dashguru'])->name('dashboard.guru');