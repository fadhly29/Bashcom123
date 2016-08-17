<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apl', function (Blueprint $table) {
            $table->increments('id');
            $table->string('penanggungjawab');
            $table->string('bentuk_pergantian');
            $table->string('jenis_pergantian');
            $table->string('kawasan');
            $table->float('luas_terkena_tol');
            $table->float('nilai_pergantian');
            $table->float('nilai_ganti_bangunan');
            $table->float('nilai_ganti_tanaman');
            $table->text('tanggal_pergantian'); 
            $table->text('uraian_penerimaan');
            $table->text('img_dokumen'); //json
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
        Schema::drop('apl');
    }
}
