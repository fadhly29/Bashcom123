<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TanahSisa extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dpt_tanah_sisa';

	protected $fillable = [
        'data_pemohon_id',
        'kondisi',
        'luas',
        'harga',
        'total_harga',
        'harga_bangunan',
        'harga_tanaman',
        'total_ganti_rugi'
    ];

	public $timestamps = false;
}
