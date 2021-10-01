<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRabTable extends Migration
{

    public function up()
    {
        Schema::create('rab', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->foreignId('id_bidang')->constrained('bidang');
            $table->foreignId('id_rkp')->constrained('rkp');
            $table->string('nama_pengeluaran');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rab');
    }
}
