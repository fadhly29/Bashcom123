<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APL extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'apl';

	protected $fillable = [
	'penanggungjawab',
	'bentuk_pergantian',
	'jenis_pergantian',
	'kawasan',
	'luas_terkena_tol',
	'nilai_pergantian',
	'nilai_ganti_bangunan',
	'nilai_ganti_tanaman',
	'tanggal_pergantian',
	'uraian_penerimaan',
	'img_dokumen'
	];

	public $timestamps = true;
}
