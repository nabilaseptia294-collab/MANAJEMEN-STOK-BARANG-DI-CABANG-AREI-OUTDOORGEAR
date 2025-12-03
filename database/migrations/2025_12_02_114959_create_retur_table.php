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
        if (!Schema::hasTable('retur'))
        Schema::create('retur', function (Blueprint $table) {
            $table->id(column: 'id_retur');
            $table->foreignId('id_admin')->constrained()->onDelete('cascade');
            $table->string(column: 'jumlah_retur');
            $table->string(column: 'tanggal_retur');
            $table->string(column: 'alasan_retur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retur');
    }
};
