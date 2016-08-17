<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'apl_jenis';

	protected $fillable = [ 'name' ];

	public $timestamps = true;
}
