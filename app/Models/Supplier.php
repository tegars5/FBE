<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'suppliers'; // Pastikan ini menunjuk ke tabel 'suppliers'

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'region',
        'monthly_capacity',
        'dura_composition',
        'tenera_composition',
        'pisifera_composition',
        'annual_sales',
        'desired_price',
        'years_operation',
        'minimum_order_quantity',
        'contact_name',
        'contact_email',
        'contact_phone',
        'submission_status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'monthly_capacity' => 'float',
        'dura_composition' => 'float',
        'tenera_composition' => 'float',
        'pisifera_composition' => 'float',
        'annual_sales' => 'float',
        'desired_price' => 'float',
        'years_operation' => 'integer',
    ];

    /**
     * Get the user that owns the supplier.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
