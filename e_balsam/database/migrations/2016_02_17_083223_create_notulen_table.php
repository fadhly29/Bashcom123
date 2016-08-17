<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotulenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tanggal');
            $table->string('waktu');
            $table->string('tempat');
            $table->string('agenda');
            $table->string('pemimpin');
            $table->string('notulis');
            $table->text('img_notulen');
            $table->text('img_daftar_hadir');
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
        Schema::drop('notulen');
    }
}
