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
        Schema::create('penerimaan_barang', function (Blueprint $table) {
            $table->id(column: 'id_penerimaan');
            $table->string('no_penerimaan')->unique();
            $table->string('no_surat_jalan')->unique();
<<<<<<< HEAD
            $table->foreignId('id_admin'); 
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
            $table->foreignId('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('produks')->onDelete('cascade');
=======
            $table->foreignId('id_user'); 
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('products')->onDelete('cascade');
>>>>>>> 84189c8 (Update model dan blade penerimaan)
            $table->date('tanggal_terima');
            $table->string('catatan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_barang');
    }
};
