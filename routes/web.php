<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;

use App\Http\Controllers\KurikulumController;


use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SoalUjianController;
use App\Http\Controllers\UploadKisiController;
use App\Http\Controllers\UserController;
use App\Models\UploadKisi;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\Route;









Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login'); // Menampilkan form login
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Proses login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Proses logout

// Kurikulum Routes
Route::get('/dashboard/kurikulum', [KurikulumController::class, 'dashKurikulum'])->name('dashboard.kurikulum');
//Kisi Kisi Kurikulum
Route::get('/kisi-kisi/kurikulum', [KurikulumController::class, 'index'])->name('kisi.kurikulum');
Route::get('/kisi-kisi/create/kurikulum', [KurikulumController::class, 'create'])->name('kisi.create.kurikulum');
Route::post('/kisi-kisi/store/kurikulum', [KurikulumController::class, 'store'])->name('kisi.store.kurikulum');
Route::get('/kisi-kisi/edit/kurikulum/{id}', [KurikulumController::class, 'edit'])->name('kisi.edit.kurikulum');
Route::put('/kisi-kisi/update/kurikulum/{id}', [KurikulumController::class, 'update'])->name('kisi.update.kurikulum');
Route::delete('/kisi-kisi/destroy/kurikulum/{id}', [KurikulumController::class, 'destroy'])->name('kisi.destroy.kurikulum');

//Soal Ujian Kurikulum
Route::get('/soal-ujian/kurikulum', [KurikulumController::class, 'indexSoal'])->name('soal.kurikulum');
Route::get('/soal-ujian/create/kurikulum', [KurikulumController::class, 'createSoal'])->name('soal.create.kurikulum');
Route::post('/soal-ujian/store/kurikulum', [KurikulumController::class, 'storeSoal'])->name('soal.store.kurikulum');
Route::get('/soal-ujian/edit/kurikulum/{id}', [KurikulumController::class, 'editSoal'])->name('soal.edit.kurikulum');
Route::put('/soal-ujian/update/kurikulum/{id}', [KurikulumController::class, 'updateSoal'])->name('soal.update.kurikulum');
Route::delete('/soal-ujian/destroy/kurikulum/{id}', [KurikulumController::class, 'destroySoal'])->name('soal.destroy.kurikulum');







//GURU
Route::get('/dashboard/guru', [GuruController::class, 'dashguru'])->name('dashboard.guru');

//Kisi Kisi Guru
Route::get('/kisi-kisi/guru', [KurikulumController::class, 'index'])->name('kisi.guru');
Route::get('/kisi-kisi/create/guru', [KurikulumController::class, 'create'])->name('kisi.create.guru');
Route::post('/kisi-kisi/store/guru', [KurikulumController::class, 'store'])->name('kisi.store.guru');
Route::get('/kisi-kisi/edit/guru/{id}', [KurikulumController::class, 'edit'])->name('kisi.edit.guru');
Route::put('/kisi-kisi/update/guru/{id}', [KurikulumController::class, 'update'])->name('kisi.update.guru');
Route::delete('/kisi-kisi/destroy/guru/{id}', [KurikulumController::class, 'destroy'])->name('kisi.destroy.guru');

//Soal Ujian Guru
Route::get('/soal/ujian/guru', [SoalUjianController::class, 'index'])->name('soal.guru');
Route::get('/soal/create/guru', [SoalUjianController::class, 'create'])->name('soal.create.guru');
Route::post('/soal/store/guru', [SoalUjianController::class, 'store'])->name('soal.store.guru');
Route::get('/soal/edit/guru/{id}', [SoalUjianController::class, 'edit'])->name('soal.edit.guru');
Route::put('/soal/update/guru/{id}', [SoalUjianController::class, 'update'])->name('soal.update.guru');
Route::delete('/soal/destroy/guru/{id}', [SoalUjianController::class, 'destroy'])->name('soal.destroy.guru');
Route::get('/soal/download/blangko', [SoalUjianController::class, 'downloadTemplate'])->name('download.soal');





Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');



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
