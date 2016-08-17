<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'galery';

	protected $fillable = [
	'paket',
	'sta_mulai',
	'sta_akhir',
	'uraian_pekerjaan',
	'status_kondisi',
	'pekerjaan_mulai',
	'pekerjaan_akhir',
	'permasalahan_teknik_fisik',
	'img_kondisi'
	];

	public $timestamps = true;
}
