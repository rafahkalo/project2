<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
<<<<<<< HEAD

=======
>>>>>>> 7f7f7282d98748859990061e432598cb63f6c8a2
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
<<<<<<< HEAD
    protected $fillable = [
        'name',
        'email',
        'password',
=======
    protected $table='users';
    
    public $timestamps=false;
     
   
    protected $fillable = [
        'lastname',
        'address',
        'age',
        'email',
        'password',
        'c_password',
        'phone',
>>>>>>> 7f7f7282d98748859990061e432598cb63f6c8a2
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
        'password' => 'hashed',
    ];
}