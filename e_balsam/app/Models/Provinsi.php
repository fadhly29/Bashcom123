<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'loc_provinsi';

	protected $fillable = [ 'name' ];

	public $timestamps = true;

	/**
     * Get the kabupaten for the blog post.
     */
    public function kabupaten()
    {
        return $this->hasMany('App\Models\Kabupaten');
    }
}
