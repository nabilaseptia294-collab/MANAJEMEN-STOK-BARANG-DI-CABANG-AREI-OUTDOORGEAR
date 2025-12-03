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
        if (!Schema::hasTable('stok'))
        Schema::create('stok', function (Blueprint $table) {
            $table->id(column: 'id_stok');
            $table->foreignId('id_produk')->constrained()->onDelete('cascade');
            $table->integer(column: 'jumlah_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok');
    }
};
