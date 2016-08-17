<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\APL;
use App\Models\Kabupaten;
use App\Models\Bentuk;
use App\Models\Jenis;
use Auth, Redirect, Crypt, Input, Validator, File;

class AplController extends Controller
{
	function __construct(){
		$this->auth 		= Auth::user();
		$this->upload_path 	= 'uploads/apl/';
		$this->rules  		= array(
			'penanggungjawab'		=> 'required',
			'bentuk_pergantian'		=> 'required',
			'jenis_pergantian'		=> 'required',
			'kawasan'				=> 'required',
			'luas_terkena_tol'		=> 'required',
			'nilai_pergantian'		=> 'required',
			'nilai_ganti_bangunan'	=> 'required',
			'nilai_ganti_tanaman'	=> 'required',
			'tanggal_pergantian'	=> 'required',
			'uraian_penerimaan'		=> 'required'
		);
	}

	public function getIndex(){
		$data ['me'] 	 = $this->auth;
		$data ['title']	 = "APL Management";
		$data ['apl'] 	 = APL::all();
		$data ['bentuk'] = Bentuk::all();
		$data ['jenis']  = Jenis::all();
		$data ['count']	 = count( $data['apl'] );
		$data ['lokasi'] = Kabupaten::all();
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);
		// dd($data);
		return view( 'admin.apl.index', $data );
	}

	public function postCreate(){
		$input 	= Input::all();

		$validator = Validator::make( $input, $this->rules );
		if( $validator->passes() ){
			APL::create( $input );

			return Redirect::back();
		} else {
        	$messages = $validator->messages();

			return Redirect::back()
					->withErrors( $validator );
		}
	}

	public function postUpdate( $id_encrypted ){
		$id 	= Crypt::decrypt( $id_encrypted );
		$input 	= Input::all();

		$validator = Validator::make( $input, $this->rules );
		if( $validator->passes() ){

			$data = APL::find( $id );
			$data->penanggungjawab		= $input['penanggungjawab'];
			$data->bentuk_pergantian	= $input['bentuk_pergantian'];
			$data->jenis_pergantian		= $input['jenis_pergantian'];
			$data->kawasan				= $input['kawasan'];
			$data->luas_terkena_tol		= $input['luas_terkena_tol'];
			$data->nilai_pergantian		= $input['nilai_pergantian'];
			$data->nilai_ganti_bangunan	= $input['nilai_ganti_bangunan'];
			$data->nilai_ganti_tanaman	= $input['nilai_ganti_tanaman'];
			$data->tanggal_pergantian	= $input['tanggal_pergantian'];
			$data->uraian_penerimaan	= $input['uraian_penerimaan'];
			$data->save();

			return Redirect::back();
		} else {
			$messages = $validator->messages();

			return Redirect::back()
					->withErrors( $validator );
		}
	}

	public function getDelete( $id_encrypted ){
		$id = Crypt::decrypt( $id_encrypted );
		$data = APL::find( $id );
		$data->delete();
		
		return Redirect::back();
	}

	public function getUpload( $id_encrypted ){
		$id 			= Crypt::decrypt( $id_encrypted );
		$data['title'] 	= "APL - Upload Image";
		$data['me'] 	= $this->auth;
		$data['data'] 	= APL::find($id);
		$data['data']['kawasan'] 			= Kabupaten::find( $data['data']['kawasan'] )->name;
		$data['data']['bentuk_pergantian'] 	= Bentuk::find( $data['data']['bentuk_pergantian'] )->name;
		$data['data']['jenis_pergantian'] 	= Jenis::find( $data['data']['jenis_pergantian'] )->name;
		if ( $data['data']->img_dokumen ) {
			$data['path']	= $this->upload_path.explode('/', json_decode( $data['data']->img_dokumen )[0])[3];
		} else {
			$data['path']	= $this->upload_path.str_replace(':', '.', $data['data']->created_at);
		}

		if ($data['data']->img_dokumen) {
			$raw = json_decode( $data['data']->img_dokumen );
			$data['image_apl'] 	= array();
			$data['raw_apl'] 	= array();
			$data['pdf_apl'] 	= array();
			foreach ($raw as $raw_file) {
				$file = explode('.', $raw_file);
				if( end( $file ) == "jpg" || end( $file ) == "png" || end( $file ) == "jpeg" || end( $file ) == "JPG" || end( $file ) == "PNG"|| end( $file ) == "JPEG" ){
					$file = implode('.', $file);
					array_push($data['image_apl'], $file);
				} elseif ( end( $file ) == "pdf"  ) {
					$file = implode('.', $file);
					$file = explode('/', $file);
					array_push($data['pdf_apl'], $file);
				} else {
					$file = implode('.', $file);
					$file = explode('/', $file);
					array_push($data['raw_apl'], $file);
				}
			}
		}
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);
		// dd($data);
		return view( 'admin.apl.upload', $data );
	}

	public function uploadFile($id_encrypted, $path){
		$path 	= Crypt::decrypt( $path );
		$id 	= Crypt::decrypt( $id_encrypted );
		$data   = Input::file();
		$key 	= array_keys($data);
		$input 	= Input::file($key[0]);

		$peraturan= APL::find($id);
	    
	    $destinationPath  = public_path().'/'.$path;

		$filename = $path.'/'.$input->getClientOriginalName();
		$upload   = $input->move($destinationPath, $filename);

		return $this->saveDB( $id, $filename, $key[0] );
	}

	public function saveDB( $id, $filename, $key ){
		$input 	= APL::find( $id );
		$field 	= 'img_dokumen';

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
		
		$update = APL::find( $id );
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
}