<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'peraturan';

	protected $fillable = [ 
		'id',
		'nomor',
		'judul',
		'tanggal_keluar',
		'masa_berlaku',
		'pemberi',
		'img_peraturan'
	];

	public $timestamps = true;
}
