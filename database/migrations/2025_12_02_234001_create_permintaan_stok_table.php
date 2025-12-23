<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
<<<<<<< HEAD
=======
    /**
     * Run the migrations.
     */
>>>>>>> 84189c8 (Update model dan blade penerimaan)
    public function up(): void
    {
        if (!Schema::hasTable('permintaan_stok'))
        Schema::create('permintaan_stok', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
            $table->unsignedBigInteger('id_admin');
            $table->date('tanggal');
            $table->string('status');
=======
            $table->id(column: 'id_permintaan_stok');
            $table->foreignId('id_user'); 
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string(column: 'tanggal_permintaan');
            $table->string(column: 'status');
            $table->string(column: 'alasan');
>>>>>>> 84189c8 (Update model dan blade penerimaan)
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
