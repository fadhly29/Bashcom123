<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dpt_data_pemohon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();

            $table->string('nama');
            $table->string('ktp_passport')->nullable();
            $table->string('jk');
            $table->string('status_kawin');
            $table->string('pekerjaan');
            $table->string('kewarganegaraan');
            $table->string('masa_berlaku_ktp_passport');
            $table->text('alamat');

            $table->string('keluarga_nama')->nullable();
            $table->string('keluarga_ktp_passport')->nullable();
            $table->string('keluarga_jk')->nullable();
            $table->string('keluarga_status_kawin')->nullable();
            $table->string('keluarga_pekerjaan')->nullable();
            $table->string('keluarga_kewarganegaraan')->nullable();
            $table->string('keluarga_masa_berlaku_ktp_passport')->nullable();
            $table->text('keluarga_alamat')->nullable();

            $table->string('img_ktp_pemohon')->nullable();
            $table->string('img_ktp_keluarga_pemohon')->nullable();
            $table->string('img_kartu_keluarga')->nullable();
            $table->string('img_surat_keterangan_domisili')->nullable();
            $table->string('img_akte_kelahiran_pemohon')->nullable();
            $table->string('img_surat_persetujuan_keluarga')->nullable();
            $table->string('img_akta_cerai')->nullable();
            $table->string('img_surat_kematian')->nullable();
            $table->string('img_surat_kuasa')->nullable();
            $table->string('img_surat_kuasa_waris')->nullable();
            $table->string('img_surat_pengampuan')->nullable();
            $table->string('img_surat')->nullable();
            

            $table->timestamps();

            // foreign key on users
            $table->foreign     ( 'user_id' )
                  ->references  ( 'id' )
                  ->on          ( 'users' )
                  ->onDelete    ( 'cascade' );
        });

        Schema::create('dpt_detail_tanah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alas_hak_id')->unsigned()->nullable();
            $table->integer('data_pemohon_id')->unsigned()->nullable();
            $table->integer('provinsi_id')->unsigned()->nullable();
            $table->integer('kabupaten_id')->unsigned()->nullable();
            $table->integer('kecamatan_id')->unsigned()->nullable();
            $table->integer('kelurahan_id')->unsigned()->nullable();

            $table->string('nomor_alas_hak');
            $table->string('nomor_peta_bidang');
            $table->string('atas_nama_bidang');

            $table->string('luas_tanah');
            $table->string('luas_terkena');
            $table->string('harga_tanah');
            $table->string('total_harga');
            $table->string('harga_bangunan');
            $table->string('harga_tanaman');
            $table->string('total_ganti_rugi');
            $table->string('tanggal_pembayaran');
            $table->string('dibayar');
            $table->string('status_pembayaran');

            $table->text('img_alas_hak')->nullable();
            $table->text('img_rekening')->nullable();
            $table->string('img_nominatif')->nullable();
            $table->string('img_kwitansi')->nullable();
            $table->string('img_SPPT')->nullable();
            $table->string('img_STTS')->nullable();
            $table->string('img_surat_pernyataan_tidak_sengketa')->nullable();
            $table->string('img_surat_pernyataan_pengosongan_lahan')->nullable();
            $table->text('img_peta_bidang')->nullable();
            $table->string('img_surat_pernyataan_jual_beli_tanah')->nullable();
            $table->string('img_berita_acara_pemeriksaan_lapangan')->nullable();
            $table->string('img_ba_penetapan_harga_ganti_rugi')->nullable();
            $table->string('img_surat_pelepasan_hak')->nullable();
            $table->string('img_surat_pernyataan_persetujuan_harga')->nullable();

            $table->timestamps();

            // foreign key on alas_hak
            $table->foreign     ( 'alas_hak_id' )
                  ->references  ( 'id' )
                  ->on          ( 'alas_hak' )
                  ->onDelete    ( 'cascade' ); 

            // foreign key on dpt_data_pemohon
            $table->foreign     ( 'data_pemohon_id' )
                  ->references  ( 'id' )
                  ->on          ( 'dpt_data_pemohon' )
                  ->onDelete    ( 'cascade' );

            // foreign key on loc_kelurahan
            $table->foreign     ( 'kelurahan_id' )
                  ->references  ( 'id' )
                  ->on          ( 'loc_kelurahan' )
                  ->onDelete    ( 'cascade' ); 

            // foreign key on loc_kecamatan
            $table->foreign     ( 'kecamatan_id' )
                  ->references  ( 'id' )
                  ->on          ( 'loc_kecamatan' )
                  ->onDelete    ( 'cascade' ); 

            // foreign key on loc_kabupaten
            $table->foreign     ( 'kabupaten_id' )
                  ->references  ( 'id' )
                  ->on          ( 'loc_kabupaten' )
                  ->onDelete    ( 'cascade' ); 

            // foreign key on loc_provini
            $table->foreign     ( 'provinsi_id' )
                  ->references  ( 'id' )
                  ->on          ( 'loc_provinsi' )
                  ->onDelete    ( 'cascade' ); 
        });

        Schema::create('dpt_tanah_sisa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_pemohon_id')->unsigned()->nullable();
            $table->text('kondisi')->nullable();
            $table->string('luas')->nullable();
            $table->string('harga')->nullable();
            $table->string('total_harga')->nullable();
            $table->string('harga_bangunan')->nullable();
            $table->string('harga_tanaman')->nullable();
            $table->string('total_ganti_rugi')->nullable();

            // foreign key on dpt_data_pemohon
            $table->foreign     ( 'data_pemohon_id' )
                  ->references  ( 'id' )
                  ->on          ( 'dpt_data_pemohon' )
                  ->onDelete    ( 'cascade' );
        });

        Schema::create('dpt_fasos_fasum', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_pemohon_id')->unsigned()->nullable();
            $table->string('bentuk')->nullable();
            $table->string('status')->nullable();
            $table->string('bentuk_pergantian')->nullable();
            $table->string('penerima_pergantian')->nullable();
            $table->string('tanggal_pergantian')->nullable();

            //( JSON banyak image dalam 1 field )
            $table->text('img_backup_dokumen')->nullable();

            // foreign key on dpt_data_pemohon
            $table->foreign     ( 'data_pemohon_id' )
                  ->references  ( 'id' )
                  ->on          ( 'dpt_data_pemohon' )
                  ->onDelete    ( 'cascade' );
        });

        Schema::create('dpt_wakaf', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('data_pemohon_id')->unsigned()->nullable();
            $table->string('bentuk')->nullable();
            $table->string('status')->nullable();
            $table->string('nadzir')->nullable();
            $table->string('bentuk_pergantian')->nullable();
            $table->string('penerima_pergantian')->nullable();
            $table->string('tanggal_pergantian')->nullable();

            //( JSON banyak image dalam 1 field )
            $table->text('img_backup_dokumen')->nullable();

            // foreign key on dpt_data_pemohon
            $table->foreign     ( 'data_pemohon_id' )
                  ->references  ( 'id' )
                  ->on          ( 'dpt_data_pemohon' )
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
        Schema::drop('dpt_data_pemohon');
        Schema::drop('dpt_detail_tanah');
        Schema::drop('dpt_fasos_fasum');
        Schema::drop('dpt_wakaf');
    }
}
