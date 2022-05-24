<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idMeja');
            $table->foreign('idMeja')->references('id')->on('mejas')->onDelete('cascade');
            $table->integer('jumlah_pesanan')->default('0');
            $table->float('jumlah_harga')->default('0');
            $table->foreignId('idAkun')->nullable();
            $table->foreign('idAkun')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pesanans');
    }
}
