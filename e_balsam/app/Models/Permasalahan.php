<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permasalahan extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'permasalahan';

	protected $fillable = [
	'paket',
	'sta_mulai',
	'sta_akhir',
	'panjang_penanganan',
	'lahan_yang_dapat_dikerjakan',
	'lahan_bebas',
	'lahan_belum_bebas',
	'permasalahan',
	'penanggungjawab'
	];

	public $timestamps = true;
}
