<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlasHak extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'alas_hak';

	protected $fillable = [ 'name' ];

	public $timestamps = true;
}
