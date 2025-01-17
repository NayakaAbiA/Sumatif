<?php

use App\Models\UploadKisi;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Contracts\Cache\Store;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KurikulumController;









Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Proses login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Proses logout

// Kurikulum Routes
Route::get('/dashboard/kurikulum', [KurikulumController::class, 'dashKurikulum'])->name('dashboard.kurikulum');
Route::get('/kisi-kisi/kurikulum', [KurikulumController::class, 'kisiKurikulum'])->name('kisi.kurikulum');


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

// Guru Routes
Route::get('/dashboard/guru', [GuruController::class, 'dashguru'])->name('dashboard.guru');

// Profile Routes
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

// Kelas Routes
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/{kelas}', [KelasController::class, 'show'])->name('kelas.show');
Route::get('/kurikulum/kelas/create', [KelasController::class, 'index'])->name('kelas.index'); // Alias untuk kurikulum
Route::post('/kurikulum/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store'); // Duplikasi sebelumnya sudah dihapus
Route::get('/kelas/{id}/detail', [KelasController::class, 'detail'])->name('kelas.detail');
Route::get('/kelas/jurusan/{tingkat}', [KelasController::class, 'getJurusan'])->name('kelas.jurusan');

// Jurusan Routes
Route::get('/jurusan/siswa/{jurusanId}', [JurusanController::class, 'getSiswa'])->name('jurusan.siswa');

// Siswa Routes
Route::post('/kurikulum/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store'); // Alias untuk siswa secara umum
// Add route for deleting selected students
Route::post('/siswa/hapus', [SiswaController::class, 'deleteSelected'])->name('siswa.deleteSelected');

Route::get('/kurikulum/download-blanko', [KurikulumController::class, 'downloadBlanko'])->name('kisi.download.blanko');
// Untuk Guru
Route::get('/guru/kisi-kisi', [GuruController::class, 'index'])->name('kisi.guru');
Route::get('/guru/kisi-kisi/download/{id}', [GuruController::class, 'download'])->name('guru.download');

