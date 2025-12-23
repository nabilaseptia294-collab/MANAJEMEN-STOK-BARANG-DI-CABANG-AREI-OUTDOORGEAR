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
        Schema::create('produks', function (Blueprint $table) {
            // PRIMARY KEY
            $table->id('id_produk');

            // FOREIGN KEY ke users
            $table->unsignedBigInteger('id_admin');

            // DATA PRODUK
            $table->string('nama_produk');
            $table->string('kategori');
            $table->string('satuan');
            $table->string('harga');
            $table->string('sku')->nullable();
            $table->string('status')->default('aktif');
            $table->string('gambar')->nullable();

            $table->timestamps();

            // RELASI FOREIGN KEY
            $table->foreign('id_admin')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
