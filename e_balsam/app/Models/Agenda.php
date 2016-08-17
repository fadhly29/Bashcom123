<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'agenda';

	protected $fillable = [ 'id','kategori','deskripsi','foto' ];

	public $timestamps = true;
}
