// Contoh isi file migrasi Anda di database/migrations/YYYY_MM_DD_HHMMSS_create_suppliers_table.php
<?php

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
            $table->string('region');
            $table->decimal('monthly_capacity', 10, 2);
            $table->decimal('dura_composition', 5, 2)->nullable();
            $table->decimal('tenera_composition', 5, 2)->nullable();
            $table->decimal('pisifera_composition', 5, 2)->nullable();
            $table->decimal('annual_sales', 12, 2);
            $table->decimal('desired_price', 10, 2);
            $table->integer('years_operation');
            $table->string('contact_name');
            $table->string('contact_email')->unique();
            $table->string('contact_phone');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
