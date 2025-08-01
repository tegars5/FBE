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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('company_name');
            $table->string('country_region');
            $table->string('city');
            $table->integer('annual_pks_purchase_volume')->nullable();
            $table->integer('monthly_purchase_volume')->nullable();
            $table->string('preferred_trade_terms')->nullable();
            $table->decimal('target_price', 10, 2)->nullable();
            $table->json('products_of_interest')->nullable(); // Menggunakan JSON untuk array checkbox
            $table->integer('years_in_operation')->nullable();
            $table->string('business_license')->nullable(); // Path ke file
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone_number')->nullable();
            $table->text('additional_notes')->nullable();
            $table->string('company_logo')->nullable(); // Path ke file
            $table->string('previous_purchase_records')->nullable(); // Path ke file
            $table->boolean('is_verified')->default(false); // Status verifikasi
            $table->timestamps();
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