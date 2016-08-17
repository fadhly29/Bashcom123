<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratKeputusanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peraturan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('judul');
            $table->string('tanggal_keluar');
            $table->string('masa_berlaku');
            $table->string('pemberi');
            $table->text('img_peraturan');
            $table->timestamps();
        });

        Schema::create('undang_undang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('jenis');
            $table->string('tahun');
            $table->text('tentang');
            $table->text('img_uu');
            $table->timestamps();
        });

        Schema::create('tugas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('tanggal_surat');
            $table->text('tentang');
            $table->string('pemberi');
            $table->text('ringkas');
            $table->text('petugas');
            $table->text('img_tugas');
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
        Schema::drop('peraturan');
        Schema::drop('undang_undang');
        Schema::drop('tugas');
    }
}
