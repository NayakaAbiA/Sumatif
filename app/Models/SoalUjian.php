<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoalUjian extends Model
{
    use HasFactory;
    protected $table = 'soal_ujian';
    protected $fillable = ['nama_guru', 'mapel', 'tingkat', 'konsentrasi', 'nama_file'];
}
