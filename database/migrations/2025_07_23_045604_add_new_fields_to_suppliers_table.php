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
            // Modifikasi kolom yang ada jika diperlukan (misalnya, ganti nama atau ubah tipe)
            $table->renameColumn('type', 'supplier_type')->nullable()->change(); // Ganti nama dan buat nullable jika belum
            $table->renameColumn('monthly_capacity', 'monthly_available_volume')->nullable()->change();
            $table->renameColumn('annual_sales', 'sales_record')->nullable()->change();
            $table->renameColumn('desired_price', 'desired_selling_price')->nullable()->change();

            // Tambahkan kolom baru
            $table->float('annual_production_volume')->nullable()->after('region');
            $table->float('composition_dura')->nullable()->after('monthly_available_volume');
            $table->float('composition_tenera')->nullable()->after('composition_dura');
            $table->float('composition_pisifera')->nullable()->after('composition_tenera');
            $table->json('product_photos')->nullable()->after('composition_pisifera'); // Simpan sebagai string JSON
            $table->text('notes')->nullable()->after('product_photos');
            $table->boolean('urgent_sale_available')->default(false)->after('notes');
            $table->json('factory_photos')->nullable()->after('urgent_sale_available'); // Simpan sebagai string JSON
            $table->json('sample_pks_photos')->nullable()->after('factory_photos'); // Simpan sebagai string JSON
            $table->string('lab_test_report')->nullable()->after('sample_pks_photos'); // Simpan sebagai URL tunggal
            // Hapus kolom yang tidak lagi diperlukan, jika ada
            $table->dropColumn(['years_operation', 'contact_name', 'contact_email', 'contact_phone']); // Hapus jika ini ditangani oleh model User
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            // Kembalikan perubahan kolom
            $table->renameColumn('supplier_type', 'type')->nullable()->change();
            $table->renameColumn('monthly_available_volume', 'monthly_capacity')->nullable()->change();
            $table->renameColumn('sales_record', 'annual_sales')->nullable()->change();
            $table->renameColumn('desired_selling_price', 'desired_price')->nullable()->change();

            // Hapus kolom baru
            $table->dropColumn([
                'annual_production_volume',
                'composition_dura',
                'composition_tenera',
                'composition_pisifera',
                'product_photos',
                'notes',
                'urgent_sale_available',
                'factory_photos',
                'sample_pks_photos',
                'lab_test_report',
            ]);
            // Tambahkan kembali kolom yang dihapus, jika perlu
            $table->integer('years_operation')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
        });
    }
};
