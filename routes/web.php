<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\UploadKisiController;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Proses login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Proses logout

// Kurikulum Routes
Route::get('/dashboard/kurikulum', [KurikulumController::class, 'dashKurikulum'])->name('dashboard.kurikulum');
Route::get('/upload/kurikulum', [UploadKisiController::class, 'index'])->name('upload.kurikulum');
Route::get('/upload-kisi/create/kurikulum', [UploadKisiController::class, 'create'])->name('upload.create.kurikulum');
Route::post('/upload-kisi/store/kurikulum', [UploadKisiController::class, 'store'])->name('upload.store.kurikulum');
Route::get('/kisi-kisi/kurikulum', [KurikulumController::class, 'kisiKurikulum'])->name('kisi.kurikulum');
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
