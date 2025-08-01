<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'country_region',
        'city',
        'annual_pks_purchase_volume',
        'monthly_purchase_volume',
        'preferred_trade_terms',
        'target_price',
        'products_of_interest',
        'years_in_operation',
        'business_license',
        'contact_person_name',
        'contact_person_email',
        'contact_person_phone_number',
        'additional_notes',
        'company_logo',
        'previous_purchase_records',
        'is_verified',
    ];

    protected $casts = [
        'products_of_interest' => 'array', // Casting ke array untuk checkbox
        'is_verified' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
