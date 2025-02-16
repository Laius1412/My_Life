<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Các trường fillable
    protected $fillable = [
        'name', 'password',
    ];

    // Các trường ẩn
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Xác định trường dùng để đăng nhập
    public function findForPassport($username)
    {
        return $this->where('name', $username)->first();
    }
}