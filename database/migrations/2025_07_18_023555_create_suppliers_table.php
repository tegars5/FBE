<?php
// Pastikan ini adalah file migrasi ..._create_suppliers_table.php Anda

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Kolom dari Form Supplier
            $table->string('type'); // Mill Factory atau Collector
            $table->string('company_name');
            $table->string('region');
            $table->decimal('monthly_capacity', 15, 2);
            $table->decimal('annual_sales', 15, 2)->nullable();

            // INI KOLOM YANG HILANG DARI ERROR ANDA
            $table->decimal('desired_price', 15, 2)->nullable();

            $table->integer('minimum_order_quantity')->nullable();
            $table->integer('years_operation')->nullable();

            // Kolom Komposisi
            $table->decimal('dura_composition', 5, 2)->nullable();
            $table->decimal('tenera_composition', 5, 2)->nullable();
            $table->decimal('pisifera_composition', 5, 2)->nullable();

            // Kolom Kontak Person
            $table->string('contact_name');
            $table->string('contact_email');
            $table->string('contact_phone');

            // Kolom Status dan Volume
            $table->string('submission_status')->default('pending');
            $table->decimal('accepted_volume', 15, 2)->nullable();

            // Kolom untuk File Upload
            $table->json('factory_warehouse_photos')->nullable();
            $table->json('pks_sample_photos')->nullable();
            $table->string('lab_test_report_path')->nullable();

            // Kolom Catatan
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
