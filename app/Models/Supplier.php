<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';
    protected $fillable = [
        'user_id',
        'type',
        'company_name',
        'region',
        'monthly_capacity',
        'accepted_volume',
        'dura_composition',
        'tenera_composition',
        'pisifera_composition',
        'annual_sales',
        'desired_price',
        'minimum_order_quantity',
        'years_operation',
        'contact_name',
        'contact_email',
        'contact_phone',
        'factory_warehouse_photos',
        'pks_sample_photos',
        'lab_test_report_path',
        'submission_status',
        // optional:
        'pending_inquiries',
    ];

    protected $casts = [
        'monthly_capacity' => 'float',
        'accepted_volume' => 'float',
        'annual_sales' => 'float',
        'desired_price' => 'float',
        'years_operation' => 'integer',
        'minimum_order_quantity' => 'integer',
        'dura_composition' => 'float',
        'tenera_composition' => 'float',
        'pisifera_composition' => 'float',
        'factory_warehouse_photos' => 'array',
        'pks_sample_photos' => 'array',
        'lab_test_report_path' => 'string',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
