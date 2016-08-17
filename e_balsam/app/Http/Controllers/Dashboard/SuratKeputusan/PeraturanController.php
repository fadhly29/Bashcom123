<?php
namespace App\Http\Controllers\Dashboard\SuratKeputusan;

use App\Http\Controllers\Controller;
use App\Models\Peraturan;
use Auth, Redirect, Crypt, Input, Validator, File;

class PeraturanController extends Controller
{
	function __construct()
	{
		$this->auth 		= Auth::user();
		$this->upload_path 	= '/uploads/surat-keputusan/peraturan/';
	}

	public function getIndex(){
		$data ['me'] 	 	= $this->auth;
		$data ['title']	 	= "E-Balsam | Surat Peraturan";
		$data ['peraturan']	= Peraturan::all();
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);
		
		return view( 'admin.surat-keputusan.peraturan.index', $data );
	}

	public function postCreate(){
		$input 	= Input::all();
		$rules 	= [
			'nomor'			=> 'required',
			'judul'			=> 'required',
			'pemberi'		=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){

			$save = Peraturan::create( $input );
			
			return Redirect::route( 'peraturan.images', Crypt::encrypt( $save->id ) );
		} else {
        	$messages = $validation->messages();

			return Redirect::back()
					->withInput( $input )
					->withErrors( $validation );
		}
	}

	public function getUpload( $id_encrypted ){
		$id 			= Crypt::decrypt( $id_encrypted );
		$data['title'] 	= "Surat Peraturan - Upload Image";
		$data['me'] 	= $this->auth;
		$data['data'] 	= Peraturan::find($id);
		$data['path']	= ($data['data']->img_peraturan)
						? $this->upload_path.explode('/', json_decode( $data['data']->img_peraturan )[0])[4]
						: $this->upload_path.str_replace(':', '.', $data['data']->created_at);
		
		if ($data['data']->img_peraturan) {
			$raw = json_decode( $data['data']->img_peraturan );
			$data['image'] 	= array();
			$data['pdf'] 	= array();
			$data['raw'] 	= array();
			foreach ($raw as $raw_file) {
				$file = explode('.', $raw_file);
				if( end( $file ) == "jpg" || end( $file ) == "png" || end( $file ) == "jpeg" || end( $file ) == "JPG" || end( $file ) == "PNG"|| end( $file ) == "JPEG" ){
					$file = implode('.', $file);
					array_push($data['image'], $file);
				} elseif ( end( $file ) == "pdf"  ) {
					$file = implode('.', $file);
					$file = explode('/', $file);
					array_push($data['pdf'], $file);
				} else {
					$file = implode('.', $file);
					$file = explode('/', $file);
					array_push($data['raw'], $file);
				}
			}
		}
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);
		
		return view( 'admin.surat-keputusan.peraturan.upload', $data );
	}

	public function postUpdate( $id_encrypted ){
		$id 	= Crypt::decrypt( $id_encrypted );
		$input 	= Input::all();
		$rules	= [
			'nomor'			=> 'required',
			'judul'			=> 'required',
			'tanggal_keluar'=> 'required',
			'masa_berlaku'	=> 'required',
			'pemberi'		=> 'required'
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){

			$save = Peraturan::find($id);
			$save->nomor 			= $input['nomor'];
			$save->judul			= $input['judul'];
			$save->tanggal_keluar	= $input['tanggal_keluar'];
			$save->masa_berlaku		= $input['masa_berlaku'];
			$save->pemberi			= $input['pemberi'];
			
			$save->save();

		    
			return Redirect::route( 'peraturan.images', Crypt::encrypt( $save->id ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::back()
					->withInput( $input )
					->withErrors( $validator );
		}
	}

	public function uploadFile($id_encrypted, $path){
		$path 	= Crypt::decrypt( $path );
		$id 	= Crypt::decrypt( $id_encrypted );
		$data   = Input::file();
		$key 	= array_keys($data);
		$input 	= Input::file($key[0]);

		$peraturan= Peraturan::find($id);
	    
	    $destinationPath  = public_path().'/'.$path;

		$filename = $path.'/'.$input->getClientOriginalName();
		$upload   = $input->move($destinationPath, $filename);

		return $this->saveDB( $id, $filename, $key[0] );
	}

	public function saveDB( $id, $filename, $key ){
		$input 		= Peraturan::find( $id );

		switch ( $key ){
			case 'UploadSK';
				$field = 'img_peraturan';
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

	public function deleteImage($path){
		$path 	= Crypt::decrypt($path);
		$loc 	= Input::get('loc');
		$field	= Input::get('field');
		$id 	= Input::get('id');
		
		$update = Peraturan::find( $id );
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

	public function doDelete($id_encrypted){
		$id = Crypt::decrypt($id_encrypted);
		$del = Peraturan::find($id);

		$img['img_peraturan']	= ( $del['img_peraturan'] )?json_decode( $del->img_peraturan ):null;

		foreach ($img as $field) {
			if ( $field ) {
				foreach ($field as $filename) {
					File::delete($filename);
				}
			}
		}
		
		$del->delete();

  		return Redirect::back();
	}
}