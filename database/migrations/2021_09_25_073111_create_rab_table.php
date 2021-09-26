<?php

use App\Models\BidangModel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRabTable extends Migration
{
    public function up()
    {
        Schema::create('rab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bidang')->constrained('bidang');
            $table->string('nama_pengeluaran');
            $table->foreignId('id_datail')->constrained('detail');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }         

    public function down()
    {
        Schema::dropIfExists('rab');
    }
}
