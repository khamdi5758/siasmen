<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuam extends Model
{
    use HasFactory;
    protected $table = "tamhs";
    protected $fillable = [
        'mahasiswas_id',
        'dosens_id',
        'nama',
        'judul',
        'abstrak',
        'tahun'
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
