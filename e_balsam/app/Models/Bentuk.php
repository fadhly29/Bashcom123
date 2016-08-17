<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bentuk extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'apl_bentuk';

	protected $fillable = [ 'name' ];

	public $timestamps = true;
}
