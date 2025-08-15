<?php

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
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel users. Ini sangat penting.
            // onDelete('cascade') berarti jika user dihapus, data buyer-nya juga ikut terhapus.
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Informasi Perusahaan
            $table->string('company_name');
            $table->string('country');
            $table->string('city');
            $table->integer('years_in_operation')->nullable();

            // Kebutuhan Pembelian
            $table->decimal('annual_purchase_volume', 15, 2)->nullable(); // Total 15 digit, 2 di belakang koma
            $table->decimal('monthly_purchase_volume', 15, 2)->nullable();
            $table->string('preferred_trade_terms'); // Contoh: FOB, CIF
            $table->decimal('target_price', 10, 2)->nullable();
            $table->json('products_of_interest')->nullable(); // Menggunakan JSON untuk menyimpan multiple choice

            // Informasi Kontak
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');

            // Dokumen & Catatan (Menyimpan path ke file)
            $table->string('business_license_path')->nullable();
            $table->string('company_logo_path')->nullable();
            $table->string('purchase_records_path')->nullable();
            $table->text('additional_notes')->nullable();

            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyers');
    }
};
