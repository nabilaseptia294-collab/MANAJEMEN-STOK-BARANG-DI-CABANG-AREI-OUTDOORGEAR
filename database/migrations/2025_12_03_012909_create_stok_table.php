<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stok', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();

            // FK ke PRODUK
            $table->unsignedBigInteger('id_produk');

            $table->integer('stok_masuk')->default(0);
            $table->integer('stok_keluar')->default(0);
            $table->integer('stok_tersedia')->default(0);

=======
            $table->id(column: 'id_stok');
            $table->foreignId('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('products')->onDelete('cascade');
            $table->integer(column: 'jumlah_masuk');
>>>>>>> 84189c8 (Update model dan blade penerimaan)
            $table->timestamps();

            // RELASI FK MANUAL (FIX)
            $table->foreign('id_produk')
                  ->references('id_produk')
                  ->on('produks')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
