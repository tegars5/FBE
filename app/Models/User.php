<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
     * Relationship: User has one Supplier
     * Setiap user hanya bisa punya satu data supplier
     */
    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    /**
     * Relationship: User has many Suppliers
     * Jika ingin user bisa punya banyak supplier, uncomment ini dan comment yang hasOne
     */
    // public function suppliers()
    // {
    // return $this->hasMany(Supplier::class);
    // }

    /**
     * Check if user has supplier data
     * Helper method untuk cek apakah user sudah punya data supplier
     */
    public function hasSupplier()
    {
        return $this->supplier()->exists();
    }

    /**
     * Get supplier data with default values
     * Helper method untuk ambil data supplier dengan fallback
     */
    public function getSupplierData()
    {
        return $this->supplier ?: new Supplier();
    }
}
