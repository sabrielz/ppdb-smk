<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // protected static $unguarded = true;
    
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'password',
    //     'identitas_id'
    // ];

    protected static $unguarded = true;

    public static $validations = [
        'name' => 'nullable|string',
        'username' => 'required|string|unique:users,username',
        'password' => 'required|string|min:8',
        'avatar' => 'nullable|image',
        'level_id' => 'required|numeric'
    ];

    public function identitas () {
        return $this->belongsTo(Identitas::class);
    }
    public function level () {
        return $this->belongsTo(UserLevel::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    // protected $fillable = [
    //     // 'name',
    //     // 'email',
    //     'username',
    //     'password',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
