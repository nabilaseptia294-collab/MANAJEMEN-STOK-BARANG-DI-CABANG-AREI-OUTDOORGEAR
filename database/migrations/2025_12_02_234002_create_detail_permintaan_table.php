<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_permintaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_permintaan');
            $table->unsignedBigInteger('id_produk');
            $table->integer('qty');
            $table->timestamps();

            // FK ke permintaan_stok (id)
            $table->foreign('id_permintaan')
                  ->references('id_permintaan_stok')
                  ->on('permintaan_stok')
                  ->onDelete('cascade');

            // FK ke produks (id_produk)
            $table->foreign('id_produk')
                  ->references('id_produk') // ⬅️ INI KUNCINYA
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_permintaan');
    }
};
