<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('retur', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id('id_retur');

            $table->unsignedBigInteger('id_admin');

            $table->integer('jumlah_retur');
            $table->date('tanggal_retur');
            $table->text('alasan_retur');

=======
            $table->id(column: 'id_retur');
            $table->foreignId('id_user'); 
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string(column: 'jumlah_retur');
            $table->string(column: 'tanggal_retur');
            $table->string(column: 'alasan_retur');
>>>>>>> 84189c8 (Update model dan blade penerimaan)
            $table->timestamps();

            $table->foreign('id_admin')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('retur');
    }
};
