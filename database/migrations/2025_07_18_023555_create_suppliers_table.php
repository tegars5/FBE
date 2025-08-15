// Contoh isi file migrasi Anda di database/migrations/YYYY_MM_DD_HHMMSS_create_suppliers_table.php
<?php

// database/migrations/YYYY_MM_DD_HHMMSS_create_final_suppliers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('type')->nullable(); // Kolom 'type' ditambahkan kembali
            $table->string('company_name')->nullable();
            $table->string('region');
            $table->decimal('monthly_capacity', 10, 2);
            $table->decimal('accepted_volume', 15, 2)->nullable();
            $table->decimal('annual_sales', 12, 2);
            $table->string('desired_selling_price')->nullable(); // Tipe diubah menjadi string
            $table->string('minimum_order_quantity')->nullable();
            $table->string('submission_status')->default('pending')->nullable();
            $table->json('factory_warehouse_photos')->nullable();
            $table->json('pks_sample_photos')->nullable();
            $table->string('lab_test_report_path')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
