<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KisiKisi extends Model
{
    use HasFactory;

    protected $table = 'kisi_kisi';

    protected $fillable = [
        'nama_file',
        'ukuran',
        'nama_guru',
        'mapel',
        'tingkat',
        'konsentrasi',
        'jawaban',
        'user_id',  // Menambahkan kolom user_id
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
