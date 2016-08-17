<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loc_provinsi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('loc_kabupaten', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provinsi_id')->unsigned()->nullable();
            $table->string('name');
            $table->timestamps();

            // foreign key on provinsi
            $table->foreign     ( 'provinsi_id' )
                  ->references  ( 'id' )
                  ->on          ( 'loc_provinsi' )
                  ->onDelete    ( 'cascade' );
        });

        Schema::create('loc_kecamatan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kabupaten_id')->unsigned()->nullable();
            $table->string('name');
            $table->timestamps();

            // foreign key on kabupaten_kota
            $table->foreign     ( 'kabupaten_id' )
                  ->references  ( 'id' )
                  ->on          ( 'loc_kabupaten' )
                  ->onDelete    ( 'cascade' );
        });

        Schema::create('loc_kelurahan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kecamatan_id')->unsigned()->nullable();
            $table->string('name');
            $table->timestamps();

           // foreign key on kecamatan
            $table->foreign     ( 'kecamatan_id' )
                  ->references  ( 'id' )
                  ->on          ( 'loc_kecamatan' )
                  ->onDelete    ( 'cascade' ); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('loc_provinsi');
        Schema::drop('loc_kabupaten');
        Schema::drop('loc_kecamatan');
        Schema::drop('loc_kelurahan');
    }
}
