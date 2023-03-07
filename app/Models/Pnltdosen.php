<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pnltdosen extends Model
{
    use HasFactory;
    protected $table = "pnltdosens";
    protected $fillable = [
        'nip',
        'judul',
        'abstrak',
        'tahun'
    ];

    public function dos()
    {
        return $this->belongsTo(Dosen::class);
    }
    
}
