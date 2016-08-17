<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deskripsi');
            $table->text('foto');
            $table->timestamps();
        });

        Schema::create('agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->text('foto');
            $table->timestamps();
        });

        Schema::create('about', function (Blueprint $table) {
            $table->increments('id');
            $table->text('deskripsi');
            $table->string('video');
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
        //
    }
}
