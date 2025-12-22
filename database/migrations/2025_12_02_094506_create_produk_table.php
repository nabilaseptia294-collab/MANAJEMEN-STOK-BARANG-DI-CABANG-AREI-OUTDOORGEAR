<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('produks'))
        Schema::create('produks', function (Blueprint $table) {
            $table->id(column: 'id_produk');
            $table->foreignId('id_admin')->constrained()->onDelete('cascade');
            $table->string(column: 'nama_produk');
            $table->string(column: 'kategori');
            $table->string(column: 'satuan');
            $table->string(column: 'harga');
            $table->string(column: 'sku')->nullable();
            $table->string(column: 'status')->default('aktif');
            $table->string(column: 'gambar')->nullable();
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
