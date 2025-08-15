<?php

// database/migrations/YYYY_MM_DD_HHMMSS_create_final_buyers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('country');
            $table->string('city');
            $table->integer('years_in_operation')->nullable();
            $table->decimal('annual_purchase_volume', 15, 2)->nullable();
            $table->decimal('monthly_purchase_volume', 15, 2)->nullable();
            $table->string('preferred_trade_terms');
            $table->decimal('target_price', 10, 2)->nullable();
            $table->json('products_of_interest')->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_phone');
            $table->string('business_license_path')->nullable();
            $table->string('company_logo_path')->nullable();
            $table->string('purchase_records_path')->nullable();
            $table->text('additional_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buyers');
    }
};
