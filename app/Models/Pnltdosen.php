<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pnltdosen extends Model
{
    use HasFactory;
    protected $table = "pnltdosens";
    protected $fillable = [
        'dosens_id',
        'judul',
        'abstrak',
        'tahun',
        'link'
    ];

    public function dosens()
    {
        return $this->belongsTo(Dosen::class);
    }
    
}
