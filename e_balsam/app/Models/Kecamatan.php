<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'loc_kecamatan';

	protected $fillable = [ 'kabupaten_id', 'name' ];

	public $timestamps = true;

	/**
     * Get the kabupaten for the blog post.
     */
    public function kabupaten()
    {
        return $this->belongsTo('App\Models\Kabupaten', 'kecamatan_id');
    }

    /**
     * Get the kelurahan for the blog post.
     */
    public function kelurahan()
    {
        return $this->hasMany('App\Models\Kelurahan');
    }
}
