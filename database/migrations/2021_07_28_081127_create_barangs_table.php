<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori');
            $table->unsignedBigInteger('id_brand');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->double('harga_beli', 8, 2);
            $table->double('harga_jual', 8, 2);
            $table->integer('diskon')->default(0);
            $table->timestamps();

            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('id_brand')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
