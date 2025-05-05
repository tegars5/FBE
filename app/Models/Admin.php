<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    // Jika ingin menyembunyikan password dari hasil query
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
