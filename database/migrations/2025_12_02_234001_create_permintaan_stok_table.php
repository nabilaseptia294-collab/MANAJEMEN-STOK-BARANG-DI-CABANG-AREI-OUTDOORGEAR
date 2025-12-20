<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('permintaan_stok', function (Blueprint $table) {
            $table->id('id_permintaan_stok');
            $table->foreignId('id_admin')->constrained('users')->onDelete('cascade');
            $table->string('cabang');
            $table->date('tanggal_permintaan');
            $table->string('status')->default('pending');
            $table->string('alasan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permintaan_stok');
    }
};
