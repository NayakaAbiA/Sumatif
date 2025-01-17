<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas'; // Pastikan nama tabel ini benar
    protected $fillable = [
        'kelas_id', // Foreign key
        'nama',     // Nama siswa
        'nis',      // Nomor Induk Siswa
        'nisn',     // Nomor Induk Siswa Nasional
        'jenis_kelamin'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
