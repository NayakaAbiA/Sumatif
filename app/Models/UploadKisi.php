<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadKisi extends Model
{
    use HasFactory;
    protected $table = 'upload_kisi'; 
    protected $fillable = ['name', 'type', 'size'];
}
