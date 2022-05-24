<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail__pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idMenu');
            $table->foreign('idMenu')->references('id')->on('menus')->onDelete('cascade');
            $table->foreignId('idPesanan');
            $table->foreign('idPesanan')->references('id')->on('pesanans')->onDelete('cascade');
            $table->integer('jumlah');
            $table->float('jumlah_harga');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail__pesanans');
    }
}
