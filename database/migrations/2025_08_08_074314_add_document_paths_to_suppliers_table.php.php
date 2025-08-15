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
        Schema::table('suppliers', function (Blueprint $table) {
            // Kolom untuk menyimpan array path foto (gunakan tipe json)
            $table->json('factory_warehouse_photos')->nullable()->after('contact_phone');
            $table->json('pks_sample_photos')->nullable()->after('factory_warehouse_photos');

            // Kolom untuk menyimpan satu path file laporan lab
            $table->string('lab_test_report_path')->nullable()->after('pks_sample_photos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn([
                'factory_warehouse_photos',
                'pks_sample_photos',
                'lab_test_report_path'
            ]);
        });
    }
};
