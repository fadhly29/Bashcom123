<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleryMasalahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permasalahan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paket');
            $table->string('sta_mulai');
            $table->string('sta_akhir');
            $table->float('panjang_penanganan');
            $table->float('lahan_yang_dapat_dikerjakan');
            $table->float('lahan_bebas');
            $table->float('lahan_belum_bebas');
            $table->text('permasalahan'); //json
            $table->text('penanggungjawab'); //json
            $table->timestamps();
        });

        Schema::create('galery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paket');
            $table->string('sta_mulai');
            $table->string('sta_akhir');
            $table->text('uraian_pekerjaan');
            $table->string('status_kondisi');
            $table->string('pekerjaan_mulai');
            $table->string('pekerjaan_akhir');
            $table->text('permasalahan_teknik_fisik');
            $table->text('img_kondisi');
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
        Schema::drop('permasalahan');
        Schema::drop('galery');
    }
}
