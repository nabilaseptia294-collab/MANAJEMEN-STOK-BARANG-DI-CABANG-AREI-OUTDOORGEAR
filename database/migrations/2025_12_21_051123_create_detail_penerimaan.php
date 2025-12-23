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
        Schema::create('detail_penerimaan', function (Blueprint $table) {
            $table->id(column: 'id_detail_penerimaan');
            $table->foreignId('id_penerimaan');
            $table->foreign('id_penerimaan')->references('id_penerimaan')->on('penerimaan_barang')->onDelete('cascade');
            $table->foreignId(column: 'id_produk');
<<<<<<< HEAD
            $table->foreign('id_produk')->references('id_produk')->on('produks')->onDelete('cascade');
=======
            $table->foreign('id_produk')->references('id_produk')->on('products')->onDelete('cascade');
>>>>>>> 84189c8 (Update model dan blade penerimaan)
            $table->string('sku');
            $table->integer('jumlah_surat_jalan');
            $table->integer('jumlah_diterima');
            $table->string('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penerimaan');
    }
};
