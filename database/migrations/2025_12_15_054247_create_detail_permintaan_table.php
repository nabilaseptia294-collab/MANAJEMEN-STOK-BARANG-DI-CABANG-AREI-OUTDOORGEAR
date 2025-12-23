<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasTable('detail_permintaan'))
        Schema::create('detail_permintaan', function (Blueprint $table) {
            $table->id();
            
            // Foreign key ke permintaan_stok
            $table->foreignId('id')
                  ->constrained('permintaan_stok', 'id_permintaan_stok')
                  ->onDelete('cascade');
            
            // Foreign key ke products
            $table->foreignId('id_produk')
                  ->constrained('products', 'id_produk')
                  ->onDelete('cascade');

            $table->integer('qty');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_permintaan');
    }
};
