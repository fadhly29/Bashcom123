<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'loc_kelurahan';

	protected $fillable = [ 'kecamatan_id', 'name' ];

	public $timestamps = true;

	/**
     * Get the kecamatan for the blog post.
     */
    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan', 'kecamatan_id');
    }
}
