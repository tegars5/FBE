<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'company_name',
        'country',
        'city',
        'years_in_operation',
        'annual_purchase_volume',
        'monthly_purchase_volume',
        'preferred_trade_terms',
        'target_price',
        'products_of_interest',
        'contact_person_name',
        'contact_person_email',
        'contact_person_phone',
        'business_license_path',
        'company_logo_path',
        'purchase_records_path',
        'additional_notes',
    ];

    /**
     * Tipe data cast untuk atribut.
     *
     * @var array
     */
    protected $casts = [
        'products_of_interest' => 'array',
        'years_in_operation' => 'integer',
        'annual_purchase_volume' => 'decimal:2',
        'monthly_purchase_volume' => 'decimal:2',
        'target_price' => 'decimal:2',
    ];

    /**
     * Mendapatkan user yang memiliki data buyer ini.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
