<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_retur', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_retur');
            $table->unsignedBigInteger('id_produk');

            $table->integer('jumlah');
            $table->string('keterangan')->nullable();

            $table->timestamps();

            // FK ke RETUR (id_retur)
            $table->foreign('id_retur')
                  ->references('id_retur')
                  ->on('retur')
                  ->onDelete('cascade');

            // FK ke PRODUK
            $table->foreign('id_produk')
                  ->references('id_produk')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_retur');
    }
};