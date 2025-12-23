<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('retur', function (Blueprint $table) {
            $table->id(column: 'id_retur');
            $table->foreignId('id_user'); 
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string(column: 'sku');
            $table->string(column: 'nama_barang');
            $table->string(column: 'jumlah_retur');
            $table->string(column: 'satuan');
            $table->string(column: 'tanggal_retur');
            $table->string(column: 'alasan_retur');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retur');
    }
};
