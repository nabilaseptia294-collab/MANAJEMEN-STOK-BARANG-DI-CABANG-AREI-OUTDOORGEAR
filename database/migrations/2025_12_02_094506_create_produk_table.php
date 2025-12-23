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
        if (!Schema::hasTable('products'))
        Schema::create('products', function (Blueprint $table) {
            $table->id(column: 'id_produk');
            $table->foreignId('id_user'); 
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('sku')->nullable();
            $table->string(column: 'nama_produk');
            $table->string(column: 'kategori');
            $table->string(column: 'satuan');
            $table->string(column: 'harga');
            $table->string('status')->default('aktif');
            $table->string(column: 'gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
