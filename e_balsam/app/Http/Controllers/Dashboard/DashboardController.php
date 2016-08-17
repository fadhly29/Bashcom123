<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use Auth, Redirect, Input, Crypt, Validator, File;

class DashboardController extends Controller
{
	
	function __construct()
	{
		$this->auth 		= Auth::user();
		$this->view 		= "admin.dashboard.";
		$this->upload_path 	= '/uploads/gallery/';
		$this->rules 		= array(
			'paket'						=>'required',
			'sta_mulai'					=>'required',
			'sta_akhir'					=>'required',
			'uraian_pekerjaan'			=>'required',
			'status_kondisi'			=>'required',
			'pekerjaan_mulai'			=>'required',
			'pekerjaan_akhir'			=>'required',
			'permasalahan_teknik_fisik'	=>'required'
		);
	}

	public function getIndex(){
		$data['me'] 	= $this->auth;
		$data['title'] 	= "E-Balsam | Dashboard";
		$data['role']	= json_decode($this->auth->usergroup->access_right);
		$data['data'] 	= Galery::all();
		// dd($data);
		return view( $this->view.'index', $data );
	}

	public function getDetail( $id_encrypted ){
		$id 			= Crypt::decrypt( $id_encrypted );
		$data['me'] 	= $this->auth;
		$data['title'] 	= "E-Balsam | Galery Detail";
		$data['role']	= json_decode($this->auth->usergroup->access_right);
		$data['data'] 	= Galery::find( $id );
		$data['path']	= ($data['data']->img_kondisi)
						? $this->upload_path.explode('/', json_decode( $data['data']->img_kondisi )[0])[3]
						: $this->upload_path.str_replace(':', '.', $data['data']->created_at);
		
		if ($data['data']->img_kondisi) {
			$raw = json_decode( $data['data']->img_kondisi );
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
		return view( $this->view.'detail', $data );
	}

	public function postCreate(){

		$input = Input::all();
		// dd($input);
		$rules = $this->rules;
		$pekerjaan = explode(" - ", $input['pengerjaan']);
		$input['pekerjaan_mulai'] = $pekerjaan[0];
		$input['pekerjaan_akhir'] = $pekerjaan[1];
		unset( $input['pengerjaan'] );
		unset( $input['_token'] );
		
		$validation = Validator::make($input, $rules);
		if( $validation->passes() ){
			$data = Galery::create( $input );

			return Redirect::to( route( 'dashboard.detail', Crypt::encrypt( $data->id ) ) );
		} else {
        	$messages = $validation->messages();

			return Redirect::back()->withInput( $input )->withErrors( $validation );
		}
	}

	public function postUpdate( $id_encrypted ){
		$id 						= Crypt::decrypt( $id_encrypted );
		$input 						= Input::all();
		$pekerjaan 					= explode(" - ", $input['pengerjaan']);
		$input['pekerjaan_mulai'] 	= $pekerjaan[0];
		$input['pekerjaan_akhir'] 	= $pekerjaan[1];
		unset( $input['pengerjaan'] );
		unset( $input['_token'] );

		$rules 	= $this->rules;
		$validation = Validator::make($input, $rules);
		if( $validation->passes() ){
			$data = Galery::find( $id );
			$data->paket 					 = $input['paket'];
			$data->sta_mulai 				 = $input['sta_mulai'];
			$data->sta_akhir 				 = $input['sta_akhir'];
			$data->uraian_pekerjaan 		 = $input['uraian_pekerjaan'];
			$data->status_kondisi 			 = $input['status_kondisi'];
			$data->pekerjaan_mulai 			 = $input['pekerjaan_mulai'];
			$data->pekerjaan_akhir 			 = $input['pekerjaan_akhir'];
			$data->permasalahan_teknik_fisik = $input['permasalahan_teknik_fisik'];
			$data->save();

			return Redirect::to( route( 'permasalahan.detail', $id_encrypted ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::back()->withInput( $input )->withErrors( $validator );
		}
	}

	public function getDelete( $id_encrypted ){
		$id 	= Crypt::decrypt( $id_encrypted );
		$data 	= Galery::find( $id );
		$data->delete();

		return Redirect::back();
	}

	public function uploadFile($id_encrypted, $path){
		$path 	= Crypt::decrypt( $path );
		$id 	= Crypt::decrypt( $id_encrypted );
		$data   = Input::file();
		$key 	= array_keys($data);
		$input 	= Input::file($key[0]);

		$peraturan= Galery::find($id);
	    
	    $destinationPath  = public_path().'/'.$path;

		$filename = $path.'/'.$input->getClientOriginalName();
		$upload   = $input->move($destinationPath, $filename);

		return $this->saveDB( $id, $filename, $key[0] );
	}

	public function saveDB( $id, $filename, $key ){
		$input 		= Galery::find( $id );
		$field 		= 'img_kondisi';

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
		
		$update = Galery::find( $id );
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
