<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasos extends Model{


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dpt_fasos_fasum';

	protected $fillable = [
        'id',
        'data_pemohon_id',
        'bentuk',
        'status',
        'bentuk_pergantian',
        'penerima_pergantian',
        'tanggal_pergantian',
        'img_backup_dokumen'
    ];

	public $timestamps = false;
}
