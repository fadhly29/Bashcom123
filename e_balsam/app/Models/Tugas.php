<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tugas';

	protected $fillable = [ 
		'id',
		'nomor',
		'tanggal_surat',
		'tentang',
		'pemberi',
		'ringkas',
		'petugas',
		'img_tugas'
	];

	public $timestamps = true;
}
