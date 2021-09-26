<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRkpTable extends Migration
{
    public function up()
    {
        Schema::create('rkp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bidang')->constrained('bidang');
            $table->string('sub_bidang');
            $table->string('jenis_kegiatan');
            $table->foreignId('id_lokasi')->constrained('lokasi');
            $table->string('perkiraan_volume');
            $table->string('sasaran');
            $table->string('pelaksanaan');
            $table->integer('biaya');
            $table->string('sumber');
            $table->boolean('swa_kelola');
            $table->boolean('kerja_sama');
            $table->boolean('pihak_ketiga');
            $table->date('rencana_pelaksanaan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rkp');
    }
}
