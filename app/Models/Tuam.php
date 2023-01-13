<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuam extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'judul',
        'abstrak',
        'dosen_pembimbing'
    ];
}
