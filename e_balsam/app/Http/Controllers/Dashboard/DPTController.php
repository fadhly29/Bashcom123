<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Pemohon;
use App\Models\Tanah;
use App\Models\TanahSisa;
use App\Models\Fasos;
use App\Models\Wakaf;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\AlasHak;
use App\Models\User;

use Auth, Redirect, Input, Session, Request, Crypt, File, Route, Validator;

class DPTController extends Controller{
	
	function __construct(){
		$this->auth = Auth::user();
	}

	public function getIndex(){
		$data ['me'] 		= $this->auth;
		$data ['title']		= "E-Balsam | DPT Index";
		$sort 				= Input::get( 'sort' );
		if ( $sort && $sort != "all" ) {
			switch ( $sort ) {
				case 'biasa':
					$data [ 'detail' ] = 
						\DB::table('dpt_data_pemohon')
						->join('dpt_detail_tanah', 'dpt_data_pemohon.id', '=', 'dpt_detail_tanah.data_pemohon_id')
						->join('dpt_fasos_fasum', 'dpt_data_pemohon.id', '=', 'dpt_fasos_fasum.data_pemohon_id')
						->join('dpt_wakaf', 'dpt_data_pemohon.id', '=', 'dpt_wakaf.data_pemohon_id')
						->where( 'dpt_fasos_fasum.bentuk', NULL )
						->where( 'dpt_wakaf.bentuk', NULL )
						->select(
							'dpt_data_pemohon.id',
							'dpt_data_pemohon.nama',
							'dpt_detail_tanah.provinsi_id',
							'dpt_detail_tanah.kabupaten_id',
							'dpt_detail_tanah.kecamatan_id',
							'dpt_detail_tanah.kelurahan_id',
							'dpt_detail_tanah.luas_terkena',
							'dpt_detail_tanah.total_harga',
							'dpt_detail_tanah.harga_bangunan',
							'dpt_detail_tanah.harga_tanaman',
							'dpt_detail_tanah.total_ganti_rugi',
							'dpt_detail_tanah.tanggal_pembayaran'
						)
						->get();
					break;
				case 'fasos':
					$data [ 'detail' ] = 
						\DB::table('dpt_data_pemohon')
						->join('dpt_detail_tanah', 'dpt_data_pemohon.id', '=', 'dpt_detail_tanah.data_pemohon_id')
						->join('dpt_fasos_fasum', 'dpt_data_pemohon.id', '=', 'dpt_fasos_fasum.data_pemohon_id')
						->join('dpt_wakaf', 'dpt_data_pemohon.id', '=', 'dpt_wakaf.data_pemohon_id')
						->where( 'dpt_fasos_fasum.bentuk', '!=' ,'NULL' )
						->select(
							'dpt_data_pemohon.id',
							'dpt_data_pemohon.nama',
							'dpt_detail_tanah.provinsi_id',
							'dpt_detail_tanah.kabupaten_id',
							'dpt_detail_tanah.kecamatan_id',
							'dpt_detail_tanah.kelurahan_id',
							'dpt_detail_tanah.luas_terkena',
							'dpt_detail_tanah.total_harga',
							'dpt_detail_tanah.harga_bangunan',
							'dpt_detail_tanah.harga_tanaman',
							'dpt_detail_tanah.total_ganti_rugi',
							'dpt_detail_tanah.tanggal_pembayaran'
						)
						->get();
					break;
				case 'wakaf':
					$data [ 'detail' ] = 
						\DB::table('dpt_data_pemohon')
						->join('dpt_detail_tanah', 'dpt_data_pemohon.id', '=', 'dpt_detail_tanah.data_pemohon_id')
						->join('dpt_fasos_fasum', 'dpt_data_pemohon.id', '=', 'dpt_fasos_fasum.data_pemohon_id')
						->join('dpt_wakaf', 'dpt_data_pemohon.id', '=', 'dpt_wakaf.data_pemohon_id')
						->where( 'dpt_wakaf.bentuk', '!=' ,'NULL' )
						->select(
							'dpt_data_pemohon.id',
							'dpt_data_pemohon.nama',
							'dpt_detail_tanah.provinsi_id',
							'dpt_detail_tanah.kabupaten_id',
							'dpt_detail_tanah.kecamatan_id',
							'dpt_detail_tanah.kelurahan_id',
							'dpt_detail_tanah.luas_terkena',
							'dpt_detail_tanah.total_harga',
							'dpt_detail_tanah.harga_bangunan',
							'dpt_detail_tanah.harga_tanaman',
							'dpt_detail_tanah.total_ganti_rugi',
							'dpt_detail_tanah.tanggal_pembayaran'
						)
						->get();
					# code...
					break;
			}
			
		} else {
			$data [ 'detail' ] = 
				\DB::table('dpt_data_pemohon')
				->join('dpt_detail_tanah', 'dpt_data_pemohon.id', '=', 'dpt_detail_tanah.data_pemohon_id')
				->select(
					'dpt_data_pemohon.id',
					'dpt_data_pemohon.nama',
					'dpt_detail_tanah.provinsi_id',
					'dpt_detail_tanah.kabupaten_id',
					'dpt_detail_tanah.kecamatan_id',
					'dpt_detail_tanah.kelurahan_id',
					'dpt_detail_tanah.luas_terkena',
					'dpt_detail_tanah.total_harga',
					'dpt_detail_tanah.harga_bangunan',
					'dpt_detail_tanah.harga_tanaman',
					'dpt_detail_tanah.total_ganti_rugi',
					'dpt_detail_tanah.tanggal_pembayaran'
				)
				->get();
		}

		$count = count( $data['detail'] );
		for ($i=0; $i < $count; $i++) {
			$data['detail'][$i]->kelurahan	= Kelurahan::find( $data['detail'][$i]->kelurahan_id )->name;
		}
		$data ['role']	 		= json_decode($this->auth->usergroup->access_right);
		
		return view( 'admin.DPT.index', $data );
	}

	public function getDetail($id_encrypted){
		$id 						= Crypt::decrypt( $id_encrypted );
		$data['me'] 				= $this->auth;
		$data['title']				= "E-Balsam | DPT Perbaharui Data";
		$data['detail'] 			= \DB::table('dpt_data_pemohon')
			->where( 'dpt_data_pemohon.id', $id )
			->join('dpt_detail_tanah', 'dpt_data_pemohon.id', '=', 'dpt_detail_tanah.data_pemohon_id')
			->join('dpt_tanah_sisa', 'dpt_data_pemohon.id', '=', 'dpt_tanah_sisa.data_pemohon_id')
			->join('dpt_wakaf', 'dpt_data_pemohon.id', '=', 'dpt_wakaf.data_pemohon_id')
			->join('dpt_fasos_fasum', 'dpt_data_pemohon.id', '=', 'dpt_fasos_fasum.data_pemohon_id')
			->select('*',
				'dpt_data_pemohon.id',
				'dpt_detail_tanah.luas_tanah',
				'dpt_detail_tanah.luas_terkena',
				'dpt_detail_tanah.harga_tanah',
				'dpt_detail_tanah.total_harga',
				'dpt_detail_tanah.harga_bangunan',
				'dpt_detail_tanah.harga_tanaman',
				'dpt_detail_tanah.total_ganti_rugi',

				'dpt_tanah_sisa.kondisi as kondisi_tanah',
				'dpt_tanah_sisa.luas as luas_tanah_sisa',
				'dpt_tanah_sisa.harga as harga_tanah_sisa',
				'dpt_tanah_sisa.total_harga as total_harga_sisa',
				'dpt_tanah_sisa.harga_bangunan as harga_bangunan_sisa',
				'dpt_tanah_sisa.harga_tanaman as harga_tanaman_sisa',
				'dpt_tanah_sisa.total_ganti_rugi as total_ganti_rugi_sisa'
			)->first();
		
		$data ['alas']		= AlasHak::all();
		$data ['desa'] 		= Kelurahan::all();
		$data ['kecamatan'] = Kecamatan::find($data['detail']->kecamatan_id);
		$data ['kota']		= Kabupaten::find($data['detail']->kabupaten_id);
		$data ['provinsi'] 	= Provinsi::find($data['detail']->provinsi_id);
		$data ['role']	= json_decode($this->auth->usergroup->access_right);
		// dd($data);
		return view( 'admin.DPT.detail', $data );
	}

	public function getData(){
		$loc 		= Input::get( 'data' );
		$kelurahan 	= Kelurahan::find( $loc );
		$kecamatan 	= Kecamatan::find( $kelurahan->kecamatan_id );
		$kabupaten 	= Kabupaten::find( $kecamatan->kabupaten_id );
		$provinsi 	= Provinsi::find( $kabupaten->provinsi_id );
		$data['kecamatan'] = json_encode($kecamatan);
		$data['kabupaten'] = json_encode($kabupaten);
		$data['provinsi']  = json_encode($provinsi);

		return $data;
	}

	public function getCreate(){
		$data ['me'] 	= $this->auth;
		$data ['title']	= "E-Balsam | DPT";
		$data ['alas']	= AlasHak::all();
		$data ['desa'] 	= Kelurahan::all();
		$data ['role']	= json_decode($this->auth->usergroup->access_right);

		return view( 'admin.DPT.create', $data );
	}

	public function postCreate(){
		$input 		= Input::all();

		$rules 		= array(
      		'status_kawin' 				=> 'required',
      		'kewarganegaraan' 			=> 'required',
      		'jk' 						=> 'required',
      		'dibayar'					=> 'required',
      		'status-tanah'				=> 'required'
      	);
      	if ($input['status-tanah'] == 'fasos' ) {
      		$rules = [
      			'status_kawin' 				=> 'required',
	      		'kewarganegaraan' 			=> 'required',
	      		'jk' 						=> 'required',
	      		'dibayar'					=> 'required',
	      		'status-tanah'				=> 'required',
      			'bentuk_fasos'				=> 'required',
				'status_fasos'				=> 'required',
				'bentuk_pergantian_fasos'	=> 'required',
				'penerima_pergantian_fasos'	=> 'required'
      		];
      	}
      	if ($input['status-tanah'] == 'wakaf' ) {
      		$rules = [
	      		'status_kawin' 				=> 'required',
	      		'kewarganegaraan' 			=> 'required',
	      		'jk' 						=> 'required',
	      		'dibayar'					=> 'required',
	      		'status-tanah'				=> 'required',
      			'bentuk_wakaf'				=> 'required',
				'status_wakaf'				=> 'required',
				'nadzir_wakaf'				=> 'required',
				'bentuk_pergantian_wakaf'	=> 'required',
				'penerima_pergantian_wakaf'	=> 'required'
      		];
      	}
      	
    	$validator = Validator::make($input, $rules);

    	if($validator->passes()){
    		$input['user_id'] 							 = Auth::user()->id;
			$input['masa_berlaku_ktp_passport'] 		 = ( $input['ktp_passport'] ) ? "Seumur Hidup" : Null;
			$input['keluarga_masa_berlaku_ktp_passport'] = ( $input['keluarga_ktp_passport'] ) ? "Seumur Hidup" : Null;
			$pemohon = Pemohon::create( $input );
			
			$input['data_pemohon_id'] 	= $pemohon->id;
			$input['total_harga'] 		= $input['luas_terkena'] * $input['harga_tanah'];
			$input['total_ganti_rugi']  = $input['total_harga'] + $input['harga_tanaman'] + $input['harga_bangunan'];
			$input['alas_hak_id']		= (int)$input['alas_hak'];
			$input['kelurahan_id']		= (int)$input['kelurahan'];
			$kelurahan 					= Kelurahan::find($input['kelurahan_id']);
			$kecamatan 					= Kecamatan::find( $kelurahan->kecamatan_id );
			$kabupaten 					= Kabupaten::find( $kecamatan->kabupaten_id );
			$provinsi 					= Provinsi::find( $kabupaten->provinsi_id );
			$input['kecamatan_id'] 		= $kecamatan->id;
			$input['kabupaten_id'] 		= $kabupaten->id;
			$input['provinsi_id']  		= $provinsi->id;
			$input['status_pembayaran'] = $input['status-tanah'];

			$tanah = Tanah::create( $input );

			$input['kondisi'] 		 	= $input['kondisi_tanah'];
			$input['luas'] 			 	= $input['luas_tanah'] - $input['luas_terkena'];
			$input['harga'] 		 	= $input['harga_tanah_sisa'];
			$input['total_harga'] 	 	= $input['harga'] * $input['luas'];
			$input['harga_bangunan'] 	= $input['harga_bangunan_sisa'];
			$input['harga_tanaman']     = $input['harga_tanaman_sisa'];
			$input['total_ganti_rugi']  = $input['total_harga'] + $input['harga_tanaman_sisa'] + $input['harga_bangunan_sisa'];
			$sisa 	= TanahSisa::create( $input );
			
			switch ($input['status-tanah']) {
				case "fasos":
					$fasos = [];
					$fasos['data_pemohon_id'] 		= $pemohon->id;
					$fasos['bentuk'] 				= $input['bentuk_fasos'];
					$fasos['status'] 				= $input['status_fasos'];
					$fasos['bentuk_pergantian'] 	= $input['bentuk_pergantian_fasos'];
					$fasos['penerima_pergantian'] 	= $input['penerima_pergantian_fasos'];
					$fasos['tanggal_pergantian'] 	= $input['tanggal_pembayaran'];

					$fasos = Fasos::create( $fasos );

					$wakaf = [];
					$wakaf['data_pemohon_id'] 		= $pemohon->id;
					$wakaf['bentuk'] 				= null;
					$wakaf['status'] 				= null;
					$wakaf['nadzir'] 				= null;
					$wakaf['bentuk_pergantian'] 	= null;
					$wakaf['penerima_pergantian'] 	= null;
					$wakaf['tanggal_pergantian'] 	= null;

					$wakaf = Wakaf::create( $wakaf );
					break;

				case "wakaf":
					$wakaf = [];
					$wakaf['data_pemohon_id'] 		= $pemohon->id;
					$wakaf['bentuk'] 				= $input['bentuk_wakaf'];
					$wakaf['status'] 				= $input['status_wakaf'];
					$wakaf['nadzir'] 				= $input['nadzir_wakaf'];
					$wakaf['bentuk_pergantian'] 	= $input['bentuk_pergantian_wakaf'];
					$wakaf['penerima_pergantian'] 	= $input['penerima_pergantian_wakaf'];
					$wakaf['tanggal_pergantian'] 	= $input['tanggal_pembayaran'];

					$wakaf = Wakaf::create( $wakaf );

					$fasos = [];
					$fasos['data_pemohon_id'] 		= $pemohon->id;
					$fasos['bentuk'] 				= null;
					$fasos['status'] 				= null;
					$fasos['bentuk_pergantian'] 	= null;
					$fasos['penerima_pergantian'] 	= null;
					$fasos['tanggal_pergantian'] 	= null;

					$fasos = Fasos::create( $fasos );
					break;
				
				case "biasa":
					$wakaf = [];
					$wakaf['data_pemohon_id'] 		= $pemohon->id;
					$wakaf['bentuk'] 				= null;
					$wakaf['status'] 				= null;
					$wakaf['nadzir'] 				= null;
					$wakaf['bentuk_pergantian'] 	= null;
					$wakaf['penerima_pergantian'] 	= null;
					$wakaf['tanggal_pergantian'] 	= null;

					$wakaf = Wakaf::create( $wakaf );

					$fasos = [];
					$fasos['data_pemohon_id'] 		= $pemohon->id;
					$fasos['bentuk'] 				= null;
					$fasos['status'] 				= null;
					$fasos['bentuk_pergantian'] 	= null;
					$fasos['penerima_pergantian'] 	= null;
					$fasos['tanggal_pergantian'] 	= null;

					$fasos = Fasos::create( $fasos );
					break;
			}

    	} else {
    		return Redirect::back()->withErrors($validator)->withInput();
    	}
		
		return Redirect::route( 'dpt.create.upload', Crypt::encrypt( $pemohon->id ) );
	}

	public function getCreateUpload( $id_encrypted ){
		$id = Crypt::decrypt( $id_encrypted );
		$data['title'] 	= "DPT - Upload Image";
		$data['me'] 	= $this->auth;
		$data['data']	= 
		\DB::table('dpt_data_pemohon')
			->where( 'dpt_data_pemohon.id', $id )
			->join('dpt_detail_tanah', 'dpt_data_pemohon.id', '=', 'dpt_detail_tanah.data_pemohon_id')
			->join('dpt_wakaf', 'dpt_data_pemohon.id', '=', 'dpt_wakaf.data_pemohon_id')
			->join('dpt_fasos_fasum', 'dpt_data_pemohon.id', '=', 'dpt_fasos_fasum.data_pemohon_id')
			->select(
				'dpt_data_pemohon.id',
				'dpt_detail_tanah.status_pembayaran',

				'dpt_data_pemohon.img_ktp_pemohon',
		        'dpt_data_pemohon.img_ktp_keluarga_pemohon',
		        'dpt_data_pemohon.img_kartu_keluarga',
		        'dpt_data_pemohon.img_surat_keterangan_domisili',
		        'dpt_data_pemohon.img_akte_kelahiran_pemohon',
		        'dpt_data_pemohon.img_surat_persetujuan_keluarga',
		        'dpt_data_pemohon.img_akta_cerai',
		        'dpt_data_pemohon.img_surat_kematian',
		        'dpt_data_pemohon.img_surat_kuasa',
		        'dpt_data_pemohon.img_surat_kuasa_waris',
		        'dpt_data_pemohon.img_surat_pengampuan',
		        'dpt_data_pemohon.img_surat',

		        'dpt_detail_tanah.img_alas_hak',
		        'dpt_detail_tanah.img_rekening',
		        'dpt_detail_tanah.img_nominatif',
		        'dpt_detail_tanah.img_kwitansi',
		        'dpt_detail_tanah.img_SPPT',
		        'dpt_detail_tanah.img_STTS',
		        'dpt_detail_tanah.img_surat_pernyataan_tidak_sengketa',
		        'dpt_detail_tanah.img_surat_pernyataan_pengosongan_lahan',
		        'dpt_detail_tanah.img_peta_bidang',
		        'dpt_detail_tanah.img_surat_pernyataan_jual_beli_tanah',
		        'dpt_detail_tanah.img_berita_acara_pemeriksaan_lapangan',
		        'dpt_detail_tanah.img_ba_penetapan_harga_ganti_rugi',
		        'dpt_detail_tanah.img_surat_pelepasan_hak',
		        'dpt_detail_tanah.img_surat_pernyataan_persetujuan_harga',

        		'dpt_fasos_fasum.img_backup_dokumen as fasos_backup',
        		'dpt_wakaf.img_backup_dokumen as wakaf_backup'
			)
			->first();
		
		return view( 'admin.DPT.upload', $data );
	}

	public function uploadFile($id_encrypted){
		$id 	= Crypt::decrypt( $id_encrypted );
		$data   = Input::file();
		$key 	= array_keys($data);
		$input 	= Input::file($key[0]);

		$pemohon= Pemohon::find($id);
	    
	    $destinationPath  = public_path().'\uploads\images';

		$filename = '/'.$key[0].'_'.$pemohon['nama'].'-'.$this->setRandom().'.'.$input->getClientOriginalExtension();
		$upload   = $input->move($destinationPath, $filename);

		return $this->saveDB( $id, $filename, $key[0] );
	}

	function setRandom($length = null) {
		$length = ( $length == null )? 10 : $length ;
		
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function saveDB( $id, $filename, $key ){
		$filename	= 'uploads/images'.$filename;
		$pemohon 	= Pemohon::find($id);
		$tanah 		= Tanah::where( 'data_pemohon_id', $id )->first();
		$fasos 		= Fasos::where( 'data_pemohon_id', $id )->first();
		$wakaf 		= Wakaf::where( 'data_pemohon_id', $id )->first();

		switch ( $key ) {
		// Pemohon
			case 'KTPPemohon';
				$field = 'img_ktp_pemohon';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'KTPKeluarga';
				$field = 'img_ktp_keluarga_pemohon';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'KartuKeluarga';
				$field = 'img_kartu_keluarga';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'SKDomisili';
				$field = 'img_surat_keterangan_domisili';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'AktePemohon';
				$field = 'img_akte_kelahiran_pemohon';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'SPKeluarga';
				$field = 'img_surat_persetujuan_keluarga';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'AkteCerai';
				$field = 'img_akta_cerai';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'SuratKematian';
				$field = 'img_surat_kematian';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'SuratKuasa';
				$field = 'img_surat_kuasa';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'SKWaris';
				$field = 'img_surat_kuasa_waris';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'SuratPengampuan';
				$field = 'img_surat_pengampuan';
				$this->singleImg( $pemohon, $field, $filename );
			break;

			case 'Surat';
				$field = 'img_surat';
				$this->singleImg( $pemohon, $field, $filename );
			break;
		//End Pemohon

		// Tanah
			case 'AlasHak';
				$field = 'img_alas_hak';
				$this->manyImg( $tanah, $field, $filename );
			break;

			case 'Rekening';
				$field = 'img_rekening';
				$this->manyImg( $tanah, $field, $filename );
			break;

			case 'Nominatif';
				$field = 'img_nominatif';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'Kwitansi';
				$field = 'img_kwitansi';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'SPPT';
				$field = 'img_SPPT';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'STTS';
				$field = 'img_STTS';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'SuratPernyataanTidakSengketa';
				$field = 'img_surat_pernyataan_tidak_sengketa';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'SuratPernyataanPengosonganLahan';
				$field = 'img_surat_pernyataan_pengosongan_lahan';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'PetaBidang';
				$field = 'img_peta_bidang';
				$this->manyImg( $tanah, $field, $filename );
			break;

			case 'SuratPernyataanJualBeliTanah';
				$field = 'img_surat_pernyataan_jual_beli_tanah';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'BeritaAcaraPemeriksaanLapangan';
				$field = 'img_berita_acara_pemeriksaan_lapangan';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'BAPenetapanHargaGantiRugi';
				$field = 'img_ba_penetapan_harga_ganti_rugi';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'SPH';
				$field = 'img_surat_pelepasan_hak';
				$this->singleImg( $tanah, $field, $filename );
			break;

			case 'SuratPernyataanPersetujuanHarga';
				$field = 'img_surat_pernyataan_persetujuan_harga';
				$this->singleImg( $tanah, $field, $filename );
			break;
		// End Tanah

		// Fasos
			case 'BackupDokumenFasosFasum';
				$field = 'img_backup_dokumen';
				$this->manyImg( $fasos, $field, $filename );
			break;
		// End Fasos

		// Wakaf
			case 'BackupDokumenWakaf';
				$field = 'img_backup_dokumen';
				$this->manyImg( $wakaf, $field, $filename );
			break;
		// End Wakaf
		}
	}

	public function singleImg( $class, $field, $filename ){
		$data 			= $class;
		$data->$field 	= $filename;
		$data->save();

		return $data;
	}

	public function manyImg( $class, $field, $filename ){
		$data 			= $class;

		$getJson = json_decode( $data->$field );
		if ( $getJson != null ) {
			array_push($getJson, $filename);

			$data->$field 	= json_encode($getJson);
		} else {
			$data->$field 	= json_encode((array)$filename);
		}
		$data->save();

		return $data;
	}

	public function getDelImg( $path ){
		$path 	= Crypt::decrypt($path);
		$loc 	= Input::get('loc');
		$field	= Input::get('field');
		$id 	= Input::get('id');

		switch ( $loc ) {
			case 'pemohon':
				$update = Pemohon::find( $id );
				$update->$field = null;
				$update->save();
				break;
			case 'tanah':
				$update = Tanah::where( 'data_pemohon_id', $id )->get()[0];
				if ($this->isJson($update->$field)) {
					$s = array_flip( json_decode( $update->$field ) );
					unset( $s[$path] );
					
					$_s = array_flip( $s );
					$i = 0;
					foreach ($_s as $key) {
						$data[$i] = $key;
						$i++;
					}
					$update->$field = ( count( $_s ) != 0 )?json_encode( $data ) : null;
				} else {
					$update->$field = null;
				}
				$update->save();
				break;
			case 'fasos':
				$update = Fasos::where( 'data_pemohon_id', $id )->get()[0];
				if ($this->isJson($update->$field)) {
					$s = array_flip( json_decode( $update->$field ) );
					unset( $s[$path] );
					
					$_s = array_flip( $s );
					$i = 0;
					foreach ($_s as $key) {
						$data[$i] = $key;
						$i++;
					}
					$update->$field = ( count( $_s ) != 0 )?json_encode( $data ) : null;
				} else {
					$update->$field = null;
				}
				$update->save();
				break;
			case 'wakaf':
				$update = Wakaf::where( 'data_pemohon_id', $id )->get()[0];
				if ($this->isJson($update->$field)) {
					$s = array_flip( json_decode( $update->$field ) );
					unset( $s[$path] );
					
					$_s = array_flip( $s );
					$i = 0;
					foreach ($_s as $key) {
						$data[$i] = $key;
						$i++;
					}
					$update->$field = ( count( $_s ) != 0 )?json_encode( $data ) : null;
				} else {
					$update->$field = null;
				}
				$update->save();
				break;
		}
		

		$filename 	= public_path().'/'.$path;
		if (File::exists($filename))
		{
    		$a = File::delete($filename);
    		
    		return Redirect::back();
		} 
		else{
			return Redirect::back();
		}
	}

	public function isJson($string) {
	 	json_decode($string);
	 	
	 	return (json_last_error() == JSON_ERROR_NONE);
	}

	public function getUpdate($id_encrypted){
		$id 						= Crypt::decrypt( $id_encrypted );
		$data['me'] 				= $this->auth;
		$data['title']				= "E-Balsam | DPT Perbaharui Data";
		$data['detail'] 			= \DB::table('dpt_data_pemohon')
			->where( 'dpt_data_pemohon.id', $id )
			->join('dpt_detail_tanah', 'dpt_data_pemohon.id', '=', 'dpt_detail_tanah.data_pemohon_id')
			->join('dpt_tanah_sisa', 'dpt_data_pemohon.id', '=', 'dpt_tanah_sisa.data_pemohon_id')
			->join('dpt_wakaf', 'dpt_data_pemohon.id', '=', 'dpt_wakaf.data_pemohon_id')
			->join('dpt_fasos_fasum', 'dpt_data_pemohon.id', '=', 'dpt_fasos_fasum.data_pemohon_id')
			->select('*',
				'dpt_data_pemohon.id',
				'dpt_detail_tanah.luas_tanah',
				'dpt_detail_tanah.luas_terkena',
				'dpt_detail_tanah.harga_tanah',
				'dpt_detail_tanah.total_harga',
				'dpt_detail_tanah.harga_bangunan',
				'dpt_detail_tanah.harga_tanaman',
				'dpt_detail_tanah.total_ganti_rugi',

				'dpt_tanah_sisa.kondisi as kondisi_tanah',
				'dpt_tanah_sisa.luas as luas_tanah_sisa',
				'dpt_tanah_sisa.harga as harga_tanah_sisa',
				'dpt_tanah_sisa.total_harga as total_harga_sisa',
				'dpt_tanah_sisa.harga_bangunan as harga_bangunan_sisa',
				'dpt_tanah_sisa.harga_tanaman as harga_tanaman_sisa',
				'dpt_tanah_sisa.total_ganti_rugi as total_ganti_rugi_sisa'
			)->first();
		
		$data ['alas']		= AlasHak::all();
		$data ['desa'] 		= Kelurahan::all();
		$data ['kecamatan'] = Kecamatan::find($data['detail']->kecamatan_id);
		$data ['kota']		= Kabupaten::find($data['detail']->kabupaten_id);
		$data ['provinsi'] 	= Provinsi::find($data['detail']->provinsi_id);
		
		return view( 'admin.DPT.update', $data );
	}

	public function postUpdate( $id_encrypted ){
		$id 	= Crypt::decrypt( $id_encrypted );
		$input 	= Input::all();
		$input 		= Input::all();

		$rules 		= array(
      		'status_kawin' 				=> 'required',
      		'kewarganegaraan' 			=> 'required',
      		'jk' 						=> 'required',
      		'dibayar'					=> 'required',
      		'status-tanah'				=> 'required',
      	);
    	$validator = Validator::make($input, $rules);

    	if($validator->passes()){
			$pemohon = Pemohon::find( $id );
				$pemohon->user_id 							 = Auth::user()->id;
				$pemohon->nama 								 = $input['nama'];
				$pemohon->ktp_passport 						 = $input['ktp_passport'];
				$pemohon->jk 								 = $input['jk'];
				$pemohon->status_kawin 						 = $input['status_kawin'];
				$pemohon->pekerjaan 						 = $input['pekerjaan'];
				$pemohon->kewarganegaraan 					 = $input['kewarganegaraan'];
				$pemohon->masa_berlaku_ktp_passport 		 = ( $input['ktp_passport'] ) ? "Seumur Hidup" : Null;
				$pemohon->alamat 					 	  	 = $input['alamat'];

				$pemohon->keluarga_nama 					 = $input['keluarga_nama'];
		        $pemohon->keluarga_ktp_passport 			 = $input['keluarga_ktp_passport'];
		        $pemohon->keluarga_jk 						 = $input['keluarga_jk'];
		        $pemohon->keluarga_status_kawin 			 = $input['keluarga_status_kawin'];
		        $pemohon->keluarga_pekerjaan 				 = $input['keluarga_pekerjaan'];
		        $pemohon->keluarga_kewarganegaraan 			 = $input['keluarga_kewarganegaraan'];
				$pemohon->keluarga_masa_berlaku_ktp_passport = ( $input['keluarga_ktp_passport'] ) ? "Seumur Hidup" : Null;
		        $pemohon->keluarga_alamat 					 = $input['keluarga_alamat'];
			$pemohon->save();
			
			$tanah = Tanah::where( 'data_pemohon_id', $id )->first();
				$tanah->alas_hak_id			= (int)$input['alas_hak'];
		        $tanah->kelurahan_id		= (int)$input['kelurahan'];
		        $kelurahan 					= Kelurahan::find( $tanah->kelurahan_id );
				$kecamatan 					= Kecamatan::find( $kelurahan->kecamatan_id );
				$kabupaten 					= Kabupaten::find( $kecamatan->kabupaten_id );
				$provinsi 					= Provinsi::find( $kabupaten->provinsi_id );
		        $tanah->kecamatan_id		= $kecamatan->id;
		        $tanah->kabupaten_id		= $kabupaten->id;
		        $tanah->provinsi_id			= $provinsi->id;

		        $tanah->nomor_alas_hak		= $input['nomor_alas_hak'];
		        $tanah->nomor_peta_bidang	= $input['nomor_peta_bidang'];
		        $tanah->atas_nama_bidang	= $input['atas_nama_bidang'];

		        $tanah->luas_tanah			= $input['luas_tanah'];
		        $tanah->luas_terkena		= $input['luas_terkena'];
		        $tanah->harga_tanah			= $input['harga_tanah'];
		        $tanah->total_harga			= $input['luas_terkena'] * $input['harga_tanah'];
		        $tanah->harga_bangunan		= $input['harga_bangunan'];
		        $tanah->harga_tanaman		= $input['harga_tanaman'];
		        $tanah->total_ganti_rugi	= $tanah->total_harga + $input['harga_tanaman'] + $input['harga_bangunan'];

		        $tanah->tanggal_pembayaran	= $input['tanggal_pembayaran'];
		        $tanah->dibayar				= $input['dibayar'];
		        $tanah->status_pembayaran	= $input['status-tanah'];
			$tanah->save();

			$sisa = TanahSisa::where( 'data_pemohon_id', $id )->first();
				$sisa->kondisi 		 	= $input['kondisi_tanah'];
				$sisa->luas 			= $input['luas_tanah'] - $input['luas_terkena'];
				$sisa->harga 		 	= $input['harga_tanah_sisa'];
				$sisa->total_harga 	 	= $sisa->harga  * $sisa->luas;
				$sisa->harga_bangunan 	= $input['harga_bangunan_sisa'];
				$sisa->harga_tanaman    = $input['harga_tanaman_sisa'];
				$sisa->total_ganti_rugi = $sisa->total_harga + $input['harga_tanaman_sisa'] + $input['harga_bangunan_sisa'];
			$sisa->save();
			
			switch ($input['status-tanah']) {
				case "fasos":
					$fasos = Fasos::where( 'data_pemohon_id', $id )->first();
					$fasos->bentuk 				= $input['bentuk_fasos'];
					$fasos->status 				= $input['status_fasos'];
					$fasos->bentuk_pergantian 	= $input['bentuk_pergantian_fasos'];
					$fasos->penerima_pergantian = $input['penerima_pergantian_fasos'];
					$fasos->tanggal_pergantian 	= $input['tanggal_pembayaran'];
					$fasos->save();

					$wakaf = Wakaf::where( 'data_pemohon_id', $id )->first();
					$wakaf->bentuk 				= null;
					$wakaf->status 				= null;
					$wakaf->nadzir 				= null;
					$wakaf->bentuk_pergantian 	= null;
					$wakaf->penerima_pergantian = null;
					$wakaf->tanggal_pergantian 	= null;
					$wakaf->save();

					break;

				case "wakaf":
					$wakaf = Wakaf::where( 'data_pemohon_id', $id )->first();
					$wakaf->bentuk 				= $input['bentuk_wakaf'];
					$wakaf->status 				= $input['status_wakaf'];
					$wakaf->nadzir 				= $input['nadzir_wakaf'];
					$wakaf->bentuk_pergantian 	= $input['bentuk_pergantian_wakaf'];
					$wakaf->penerima_pergantian = $input['penerima_pergantian_wakaf'];
					$wakaf->tanggal_pergantian 	= $input['tanggal_pembayaran'];
					$wakaf->save();

					$fasos = Fasos::where( 'data_pemohon_id', $id )->first();
					$fasos->bentuk 				= null;
					$fasos->status 				= null;
					$fasos->bentuk_pergantian 	= null;
					$fasos->penerima_pergantian = null;
					$fasos->tanggal_pergantian 	= null;
					$fasos->save();
					break;
				
				case "biasa":
					$wakaf = Wakaf::where( 'data_pemohon_id', $id )->first();
					$wakaf->bentuk 				= null;
					$wakaf->status 				= null;
					$wakaf->nadzir 				= null;
					$wakaf->bentuk_pergantian 	= null;
					$wakaf->penerima_pergantian = null;
					$wakaf->tanggal_pergantian 	= null;
					$wakaf->save();

					$fasos = Fasos::where( 'data_pemohon_id', $id )->first();
					$fasos->bentuk 				= null;
					$fasos->status 				= null;
					$fasos->bentuk_pergantian 	= null;
					$fasos->penerima_pergantian = null;
					$fasos->tanggal_pergantian 	= null;
					$fasos->save();
					break;
			}
		} else {
    		return Redirect::back()->withErrors($validator)->withInput();
		}

		return Redirect::route( 'dpt.create.upload', Crypt::encrypt( $id ) );
	}

	public function getDelete( $id_encrypted ){
		$delete = Pemohon::find( Crypt::decrypt( $id_encrypted ) );
		$delete->delete();

		return Redirect::back();
	}
}