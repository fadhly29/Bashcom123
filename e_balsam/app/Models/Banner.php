<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'banner';

	protected $fillable = [ 'id','deskripsi','foto' ];

	public $timestamps = true;
}
