<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ptuakmhs extends Model
{
    use HasFactory;
    protected $fillable = [
        'mahasiswas_id',
        'judul',
        'deskjudul',
        'dosens_id',
        'konfdospil',
        'konfadmin',
        'catatan_dos'
    ];

    public function mahasiswas()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosens()
    {
        return $this->belongsTo(Dosen::class);
    }
}


