<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_verified', // Harus ada di fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_verified' => 'boolean', // Penting untuk casts
        ];
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    public function buyer()
    {
        return $this->hasOne(Buyer::class);
    }

    public function isBuyer()
    {
        return $this->role === 'buyer';
    }

    public function isSupplier()
    {
        return $this->role === 'supplier';
    }

    public function hasBuyer()
    {
        return $this->buyer()->exists();
    }

    public function getBuyerData()
    {
        return $this->buyer ?: new Buyer();
    }
}
