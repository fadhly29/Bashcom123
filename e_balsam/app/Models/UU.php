<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UU extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'undang_undang';

	protected $fillable = [ 
		'id',
		'nomor',
		'jenis',
		'tahun',
		'tentang',
		'img_uu'
	];

	public $timestamps = true;
}
