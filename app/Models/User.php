<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    

    protected $fillable = [ 'name', 'email', 'password' ];
    
    protected $hidden = [ 'password', 'remember_token' ];
    
    protected $casts = [ 'email_verified_at' => 'datetime', 'password' => 'hashed' ];

    public function nf(){
        return $this->hasMany(Nf::class);
    }
    
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}
