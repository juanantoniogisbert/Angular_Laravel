<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;

// use Tymon\JWTAuth\Facades\JWTAuth;

class User extends Authenticatable implements JWTSubject {
    use Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'remember_token', 'bio', 'image', 'userSocial'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = (password_get_info($value)['algo'] === 0) ? bcrypt($value) : $value;
    }

    public function getTokenAttribute() {
        return JWTAuth::fromUser($this);
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }
}
