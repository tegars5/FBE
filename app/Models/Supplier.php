<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    // Sesuaikan ini dengan nama input di formulir HTML Anda dan kolom di tabel database
    protected $fillable = [
        'user_id',
        'supplier_type',
        'region',
        'annual_production_volume',
        'monthly_available_volume',
        'dura_composition',
        'tenera_composition',
        'pisifera_composition',
        'sales_record',
        'desired_selling_price',
        'minimum_order_quantity',
        'product_photos',
        'notes',
        'urgent_sale_available',
        'factory_photos',
        'sample_pks_photos',
        'lab_test_report',
    ];

    // Mengubah tipe data untuk kolom yang akan disimpan sebagai array (JSON) atau boolean
    protected $casts = [
        'annual_production_volume' => 'float',
        'monthly_available_volume' => 'float',
        'dura_composition' => 'float',
        'tenera_composition' => 'float',
        'pisifera_composition' => 'float',
        'sales_record' => 'float',
        'minimum_order_quantity' => 'integer',
        'urgent_sale_available' => 'boolean',
        'product_photos' => 'array',
        'factory_photos' => 'array',
        'sample_pks_photos' => 'array',
    ];

    /**
     * Accessor untuk product_photos - mengembalikan array kosong jika null
     */
    public function getProductPhotosAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }

        // Jika sudah berupa array (dari casting), return langsung
        if (is_array($value)) {
            return $value;
        }

        // Jika masih string JSON, decode dulu
        return json_decode($value, true) ?: [];
    }

    /**
     * Accessor untuk factory_photos - mengembalikan array kosong jika null
     */
    public function getFactoryPhotosAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }

        if (is_array($value)) {
            return $value;
        }

        return json_decode($value, true) ?: [];
    }

    /**
     * Accessor untuk sample_pks_photos - mengembalikan array kosong jika null
     */
    public function getSamplePksPhotosAttribute($value)
    {
        if (is_null($value)) {
            return [];
        }

        if (is_array($value)) {
            return $value;
        }

        return json_decode($value, true) ?: [];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
