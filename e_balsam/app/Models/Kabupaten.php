<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'loc_kabupaten';

	protected $fillable = [ 'provinsi_id', 'name' ];

	public $timestamps = true;

	/**
     * Get the provinsi for the blog post.
     */
    public function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi', 'provinsi_id');
    }

    /**
     * Get the kecamatan for the blog post.
     */
    public function kecamatan()
    {
        return $this->hasMany('App\Models\Kecamatan');
    }

    public function tanah()
    {
        return $this->hasMany('App\Models\Tanah');
    }
}
