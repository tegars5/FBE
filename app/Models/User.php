<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Buyer;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the supplier record associated with the user.
     */
    public function supplier()
    {
        return $this->hasOne(\App\Models\Supplier::class, 'user_id');
    }

    /**
     * Get the buyer record associated with the user.
     */
    public function buyer()
    {
        // Pastikan Anda sudah memiliki model Buyer
        // Ganti \App\Models\Buyer::class jika path atau nama modelnya berbeda
        return $this->hasOne(\App\Models\Buyer::class, 'user_id');
    }
}
