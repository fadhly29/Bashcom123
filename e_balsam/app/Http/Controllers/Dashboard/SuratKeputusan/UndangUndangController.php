<?php
namespace App\Http\Controllers\Dashboard\SuratKeputusan;

use App\Http\Controllers\Controller;
use App\Models\UU;
use Auth, Redirect, Crypt, Input, Validator, File;

class UndangUndangController extends Controller
{
	function __construct()
	{
		$this->auth 	= Auth::user();
		$this->upload_path 	= '/uploads/surat-keputusan/undang-undang/';
	}

	public function getIndex(){
		$data ['me'] 	 = $this->auth;
		$data ['title']	 = "E-Balsam | Undang - undang";
		$data ['uu']  	 = UU::all();
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);

		return view( 'admin.surat-keputusan.uu.index', $data );
	}

	public function getUpload( $id_encrypted ){
		$data ['role']	= json_decode($this->auth->usergroup->access_right);
		$id 		= Crypt::decrypt( $id_encrypted );
		$data['title'] 	= "Undang undang - Upload Image";
		$data['me'] 	= $this->auth;
		$data['data'] 	= UU::find($id);
		$data['path']	= ($data['data']->img_uu)
						? $this->upload_path.explode('/', json_decode( $data['data']->img_uu )[0])[4]
						: $this->upload_path.str_replace(':', '.', $data['data']->created_at);
		
		if ($data['data']->img_uu) {
			$raw = json_decode( $data['data']->img_uu );
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
		// dd($data);
		return view( 'admin.surat-keputusan.uu.upload', $data );
	}

	public function postCreate(){
		$input 	= Input::all();
		$rules 	= [
			'nomor'		=> 'required',
			'jenis'		=> 'required',
			//'tahun'		=> 'required',
			'tentang'	=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){
			$save = UU::create( $input );
			
			return Redirect::route( 'uu.images', Crypt::encrypt( $save->id ) );
		} else {
        	$messages = $validation->messages();

			return Redirect::back()
					->withInput( $input )
					->withErrors( $validation );
		}
	}

	public function postUpdate( $id_encrypted ){
		$id = Crypt::decrypt( $id_encrypted );
		$input 	= Input::all();
		$rules 	= [
			'nomor'		=> 'required',
			'jenis'		=> 'required',
			//'tahun'		=> 'required',
			'tentang'	=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){
			$data = UU::find( $id );
			$data->nomor	= $input['nomor'];
			$data->jenis	= $input['jenis'];
			//$data->tahun	= $input['tahun'];
			$data->tentang	= $input['tentang'];
			$data->save();
			
			return Redirect::route( 'uu.images', Crypt::encrypt( $data->id ) );
		} else {
        	$messages = $validation->messages();

			return Redirect::back()
					->withInput( $input )
					->withErrors( $validation );
		}
	}

	public function uploadFile($id_encrypted, $path){
		$path 	= Crypt::decrypt( $path );
		$id 	= Crypt::decrypt( $id_encrypted );
		$data   = Input::file();
		$key 	= array_keys($data);
		$input 	= Input::file($key[0]);

		$peraturan= UU::find($id);
	    
	    $destinationPath  = public_path().'/'.$path;

		$filename = $path.'/'.$input->getClientOriginalName();
		$upload   = $input->move($destinationPath, $filename);

		return $this->saveDB( $id, $filename, $key[0] );
	}

	public function saveDB( $id, $filename, $key ){
		$input 		= UU::find( $id );

		$field = 'img_uu';
		$this->manyImg( $input, $field, $filename );
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
		
		$update = UU::find( $id );
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
		$del = UU::find($id);

		$img['img_uu']	= ( $del['img_uu'] )?json_decode( $del->img_uu ):null;

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
