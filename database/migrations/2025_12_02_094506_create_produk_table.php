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
<<<<<<< HEAD
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

=======
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
>>>>>>> 84189c8 (Update model dan blade penerimaan)
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
<<<<<<< HEAD
        Schema::dropIfExists('produks');
=======
        Schema::dropIfExists('products');
>>>>>>> 84189c8 (Update model dan blade penerimaan)
    }
};
