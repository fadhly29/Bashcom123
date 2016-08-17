<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wakaf extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dpt_wakaf';

	protected $fillable = [
        'id',
        'data_pemohon_id',
        'bentuk',
        'status',
        'nadzir',
        'bentuk_pergantian',
        'penerima_pergantian',
        'tanggal_pergantian',
        'img_backup_dokumen'
    ];

	public $timestamps = false;
}
