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
        if (!Schema::hasTable('permintaan_stok'))
        Schema::create('permintaan_stok', function (Blueprint $table) {
            $table->id(column: 'id_permintaan_stok');
            $table->foreignId('id_admin')->constrained()->onDelete('cascade');
            $table->string(column: 'tanggal_permintaan');
            $table->string(column: 'status');
            $table->string(column: 'alasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_stok');
    }
};
