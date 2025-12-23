<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkuFieldsToReturTable extends Migration
{
    public function up()
    {
        Schema::table('retur', function (Blueprint $table) {
            $table->string('sku')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('satuan')->nullable();
        });
    }

    public function down()
    {
        Schema::table('retur', function (Blueprint $table) {
            $table->dropColumn(['sku','nama_barang','satuan']);
        });
    }
}
