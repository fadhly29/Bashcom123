<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanah extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dpt_detail_tanah';

	protected $fillable = [
        'alas_hak_id',
        'data_pemohon_id',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kelurahan_id',

        'nomor_alas_hak',
        'nomor_peta_bidang',
        'atas_nama_bidang',

        'luas_tanah',
        'luas_terkena',
        'harga_tanah',
        'total_harga',
        'harga_bangunan',
        'harga_tanaman',
        'total_ganti_rugi',
        'tanggal_pembayaran',
        'dibayar',
        'status_pembayaran',
        
        'img_alas_hak',
        'img_rekening',
        'img_nominatif',
        'img_kwitansi',
        'img_SPPT',
        'img_STTS',
        'img_surat_pernyataan_tidak_sengketa',
        'img_surat_pernyataan_pengosongan_lahan',
        'img_peta_bidang',
        'img_surat_pernyataan_jual_beli_tanah',
        'img_berita_acara_pemeriksaan_lapangan',
        'img_ba_penetapan_harga_ganti_rugi',
        'img_surat_pelepasan_hak',
        'img_surat_pernyataan_persetujuan_harga'
    ];

	public $timestamps = true;

    public function kabupaten(){
        return $this->belongsTo('App\Models\Kabupaten','kabupaten_id');
    }
}
