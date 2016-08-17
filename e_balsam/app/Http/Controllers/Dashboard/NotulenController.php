<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notulen;
use Auth, Redirect, Crypt, Input, Validator, File;

class NotulenController extends Controller
{
	function __construct()
	{
		$this->auth 		= Auth::user();
		$this->upload_path 	= '/uploads/notulen/';
	}

	public function getIndex(){
		$data ['me'] 	 	= $this->auth;
		$data ['title']	 	= "E-Balsam | Notulen Index";
		$data ['notulen']	= Notulen::all();

		$data ['count']		= count($data['notulen']);
		if ( $data ['count'] > 0 ) {
			for ($i=0; $i < $data ['count']; $i++) { 
				$waktu = explode('-', $data['notulen'][$i]['waktu']);
				$data['notulen'][$i]['waktu'] 	= $waktu[0];
				$data['notulen'][$i]['bagian'] 	= $waktu[1];
				$i++;
			}
		}
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);

		return view( 'admin.notulen.index', $data );
	}

	public function postCreate(){
		$input 	= Input::all();
		$jam	= $input['waktu'].'-'.$input['bagian'];
		$rules = [
			'tanggal'		=> 'required',
			'waktu'			=> 'required',
			'tempat'		=> 'required',
			'agenda'		=> 'required',
			'pemimpin'		=> 'required',
			'notulis'		=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){

			$save 				= new Notulen;
			
			$save->tanggal 		= $input['tanggal'];
			$save->waktu		= $jam;
			$save->tempat		= $input['tempat'];
			$save->agenda		= $input['agenda'];
			$save->pemimpin		= $input['pemimpin'];
			$save->notulis		= $input['notulis'];
			$save->save();
			

			return Redirect::route( 'notulen.upload', Crypt::encrypt( $save->id ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::to( route( 'notulen.create' ) )
					->withInput( $input )
					->withErrors( $validator );
		}
	}

	public function postUpdate( $id_encrypted){
		$id 	= Crypt::decrypt( $id_encrypted );
		$input 	= Input::all();
		$jam	= $input['waktu'].'-'.$input['bagian'];
		$rules	= [
				'tanggal'	=> 'required',
				'waktu'		=> 'required',
				'tempat'	=> 'required',
				'agenda'	=> 'required',
				'pemimpin'	=> 'required',
				'notulis'	=> 'required'
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){

			$save = Notulen::find($id);
			$save->tanggal 		= $input['tanggal'];
			$save->waktu	 	= $jam;
			$save->tempat	 	= $input['tempat'];
			$save->agenda	 	= $input['agenda'];
			$save->pemimpin	 	= $input['pemimpin'];
			$save->notulis	 	= $input['notulis'];
			$save->save();
		    
			return Redirect::to( route( 'notulen' ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::to( route( 'notulen' ) )
					->withInput( $input )
					->withErrors( $validator );
		}
	}

	public function deleteImageNotulen($path){
		$path 	= Crypt::decrypt($path);
		$loc 	= Input::get('loc');
		$field	= Input::get('field');
		$id 	= Input::get('id');
		
		$update = Notulen::find( $id );
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

	public function deleteNotulen($id_encrypted){
		$id = Crypt::decrypt($id_encrypted);
		$del = Notulen::find($id);
		
		$del->delete();

  		return Redirect::back();
	}

	public function getUpload( $id_encrypted ){
		$id 			= Crypt::decrypt( $id_encrypted );
		$data['title'] 	= "Notulen - Upload Image";
		$data['me'] 	= $this->auth;
		$data['data'] 	= Notulen::find($id);
		if ( $data['data']->img_notulen ) {
			$data['path']	= $this->upload_path.explode('/', json_decode( $data['data']->img_notulen )[0])[3];
		} elseif ( $data['data']->img_daftar_hadir ) {
			$data['path']	= $this->upload_path.explode('/', json_decode( $data['data']->img_daftar_hadir )[0])[3];
		} else {
			$data['path']	= $this->upload_path.str_replace(':', '.', $data['data']->created_at);
		}

		if ($data['data']->img_notulen) {
			$raw = json_decode( $data['data']->img_notulen );
			$data['image_notulen'] 	= array();
			$data['raw_notulen'] 	= array();
			$data['pdf_notulen'] 	= array();
			foreach ($raw as $raw_file) {
				$file = explode('.', $raw_file);
				if( end( $file ) == "jpg" || end( $file ) == "png" || end( $file ) == "jpeg" || end( $file ) == "JPG" || end( $file ) == "PNG"|| end( $file ) == "JPEG" ){
					$file = implode('.', $file);
					array_push($data['image_notulen'], $file);
				} elseif ( end( $file ) == "pdf"  ) {
					$file = implode('.', $file);
					$file = explode('/', $file);
					array_push($data['pdf_notulen'], $file);
				} else {
					$file = implode('.', $file);
					$file = explode('/', $file);
					array_push($data['raw_notulen'], $file);
				}
			}
		}

		if ($data['data']->img_daftar_hadir) {
			$raw = json_decode( $data['data']->img_daftar_hadir );
			$data['image_daftar_hadir'] = array();
			$data['raw_daftar_hadir'] 	= array();
			$data['pdf_daftar_hadir'] 	= array();
			foreach ($raw as $raw_file) {
				$file = explode('.', $raw_file);
				if( end( $file ) == "jpg" || end( $file ) == "png" || end( $file ) == "jpeg" || end( $file ) == "JPG" || end( $file ) == "PNG"|| end( $file ) == "JPEG" ){
					$file = implode('.', $file);
					array_push($data['image_daftar_hadir'], $file);
				} elseif ( end( $file ) == "pdf"  ) {
					$file = implode('.', $file);
					$file = explode('/', $file);
					array_push($data['pdf_daftar_hadir'], $file);
				} else {
					$file = implode('.', $file);
					$file = explode('/', $file);
					array_push($data['raw_daftar_hadir'], $file);
				}
			}
		}
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);
		
		return view( 'admin.notulen.upload', $data );
	}

	public function uploadFile($id_encrypted, $path){
		$path 	= Crypt::decrypt( $path );
		$id 	= Crypt::decrypt( $id_encrypted );
		$data   = Input::file();
		$key 	= array_keys($data);
		$input 	= Input::file($key[0]);

		$peraturan= Notulen::find($id);
	    
	    $destinationPath  = public_path().'/'.$path;

		$filename = $path.'/'.$input->getClientOriginalName();
		$upload   = $input->move($destinationPath, $filename);

		return $this->saveDB( $id, $filename, $key[0] );
	}

	public function saveDB( $id, $filename, $key ){
		$notulen 	= Notulen::find($id);
		$input 		= Notulen::find( $id );

		switch ( $key ){
			case 'UploadNotulen';
				$field = 'img_notulen';
				$this->manyImg( $input, $field, $filename );
			break;

			case 'DaftarHadir';
				$field = 'img_daftar_hadir';
				$this->manyImg( $input, $field, $filename );
			break;
		}
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

	public function isJson($string) {
	 	json_decode($string);
	 	
	 	return (json_last_error() == JSON_ERROR_NONE);
	}
}