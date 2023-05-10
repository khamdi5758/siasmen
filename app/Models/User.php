<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function tamuser($username)
    {
            $query= User::where('username', $username)->first();
            return $query;
    }
    
    public function tampilnmuser($username,$type)
    {
        // $query=DB::table('dosens')->where('nip', $userdos)->first();
        if ($type === 1) {
            $query= User::where('username', $username)->first();
            return $query;
        }else if ($type === 2) {    
            $query= Dosen::where('nip', $username)->first();
            return $query;
        }else if ($type === 3) {
            $query= Mahasiswa::where('nim', $username)->first();
            return $query;
        }
    }
    public static function tampildatuser($username,$type)
    {
        // $query=DB::table('dosens')->where('nip', $userdos)->first();
        if ($type === 1) {
            $query= User::where('username', $username)->first();
            return $query;
        }else if ($type === 2) {    
            $query= Dosen::where('nip', $username)->first();
            return $query;
        }else if ($type === 3) {
            $query= Mahasiswa::where('nim', $username)->first();
            return $query;
        }
    }
}
