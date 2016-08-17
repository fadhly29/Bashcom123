<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notulen extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notulen';

	protected $fillable = [ 'id','tanggal','waktu','tempat','agenda','pemimpin','notulis','img_notulen','img_daftar_hadir' ];

	public $timestamps = true;
}
