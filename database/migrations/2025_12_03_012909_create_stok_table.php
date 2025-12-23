<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stok', function (Blueprint $table) {
            $table->id(column: 'id_stok');
            $table->foreignId('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('products')->onDelete('cascade');
            $table->integer(column: 'jumlah_masuk');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
