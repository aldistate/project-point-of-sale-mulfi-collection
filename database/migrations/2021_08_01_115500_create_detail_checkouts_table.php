<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_checkout');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('kategori');
            $table->string('brand');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->integer('diskon');
            $table->timestamps();

            $table->foreign('id_checkout')->references('id')->on('checkouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_checkouts');
    }
}
