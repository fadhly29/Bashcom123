<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dpt_data_pemohon';

	protected $fillable = [
        'user_id',
        'nama',
        'ktp_passport',
        'jk',
        'status_kawin',
        'pekerjaan',
        'kewarganegaraan',
        'masa_berlaku_ktp_passport',
        'alamat',
        'keluarga_nama',
        'keluarga_ktp_passport',
        'keluarga_jk',
        'keluarga_status_kawin',
        'keluarga_pekerjaan',
        'keluarga_kewarganegaraan',
        'keluarga_masa_berlaku_ktp_passport',
        'keluarga_alamat',
        
        'img_ktp_pemohon',
        'img_ktp_keluarga_pemohon',
        'img_kartu_keluarga',
        'img_surat_keterangan_domisili',
        'img_akte_kelahiran_pemohon',
        'img_surat_persetujuan_keluarga',
        'img_akta_cerai',
        'img_surat_kematian',
        'img_surat_kuasa',
        'img_surat_kuasa_waris',
        'img_surat_pengampuan',
        'img_surat'
    ];

	public $timestamps = true;

    public function setAll()
    {
        # code...
    }
}
