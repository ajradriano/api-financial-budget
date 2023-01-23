<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements ModelUUID
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_type',
        'name',
        'email',
        'password',
        'photo',
        'last_login',
        'email_verified_at',
        'updated_at'
    ];

    /**
    "id": "17d7858f-c2c5-31ed-ad0c-6deb02f9fcd6",
    "user_type": 0,
    "name": "Gael Leon",
    "email": "gaelleon@r7.com",
    "login": "gaelleon",
    "photo": null,
    "last_login": null,
    "email_verified_at": "2023-01-20T01:28:39.000000Z",
    "created_at": "2023-01-20T01:28:40.000000Z",
    "updated_at": "2023-01-20T01:28:40.000000Z",
    "deleted_at": null
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
