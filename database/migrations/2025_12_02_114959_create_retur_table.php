<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('retur', function (Blueprint $table) {
            $table->id('id_retur');

            $table->unsignedBigInteger('id_admin');

            $table->integer('jumlah_retur');
            $table->date('tanggal_retur');
            $table->text('alasan_retur');

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
