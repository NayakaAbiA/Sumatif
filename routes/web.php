<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KisiKisiController;

use App\Http\Controllers\KurikulumController;


use App\Http\Controllers\UploadKisiController;
use App\Http\Controllers\UserController;
use App\Models\UploadKisi;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;






Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Proses login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Proses logout


Route::get('/dashboard/kurikulum', [KurikulumController::class, 'dashKurikulum'])->name('dashboard.kurikulum');

Route::get('/dashboard/guru', [GuruController::class, 'dashguru'])->name('dashboard.guru');




Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');


Route::get('/kisi-kisi/kurikulum', [KurikulumController::class, 'index'])->name('kisi.kurikulum');
Route::get('/kisi-kisi/create/kurikulum', [KurikulumController::class, 'create'])->name('kisi.create.kurikulum');
Route::post('/kis-kisi/store/kurikulum', [KurikulumController::class, 'store'])->name('kisi.store.kurikulum');
Route::get('/kisi-kisi/{id}/edit', [KurikulumController::class, 'edit'])->name('kisi.edit.kurikulum');
Route::put('/kisi-kisi/{id}', [KurikulumController::class, 'update'])->name('kisi.update.kurikulum');
Route::delete('/kisi-kisi/{id}', [KurikulumController::class, 'destroy'])->name('kisi.destroy.kurikulum');


Route::get('/kisi-kisi/guru', [GuruController::class, 'index'])->name('kisi.guru');
Route::get('/kisi-kisi/create/guru', [GuruController::class, 'create'])->name('kisi.create.guru');
Route::post('/kis-kisi/store/guru', [GuruController::class, 'store'])->name('kisi.store.guru');
Route::get('/kisi-kisi/{id}/guru/edit', [GuruController::class, 'edit'])->name('kisi.edit.guru');
Route::put('/kisi-kisi/{id}/guru', [GuruController::class, 'update'])->name('kisi.update.guru');
Route::delete('/kisi-kisi/{id}/guru', [GuruController::class, 'destroy'])->name('kisi.destroy.guru');

Route::get('/daftarhadir/kurikulum', [KurikulumController::class, 'dftrHadirKurikulum'])->name('daftarhadir.kurikulum');


Route::get('/dashboard/guru', [GuruController::class, 'dashguru'])->name('dashboard.guru');

