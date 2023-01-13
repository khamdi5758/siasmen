<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $table = "sekolah";
    protected $fillable = ['code','namasekolah','npsn','jenjang','status', 'alamat','fotologo'];
}
