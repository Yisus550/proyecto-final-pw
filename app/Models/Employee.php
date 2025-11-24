<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
/* use Illuminate\Database\Eloquent\Model; */
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'password',
        'is_active',
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];
}
