<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Permasalahan;
use Auth, Redirect, Input, Crypt, Validator, File;

class MasalahController extends Controller
{
	
	function __construct()
	{
		$this->auth 		= Auth::user();
		$this->view 		= "admin.laporan.permasalahan.";
		$this->upload_path 	= '/uploads/permasalahan/';
		$this->rules 		= array(
			'paket'							=> 'required',
			'sta_mulai'						=> 'required',
			'sta_akhir'						=> 'required',
			'panjang_penanganan'			=> 'required',
			'lahan_yang_dapat_dikerjakan'	=> 'required',
			'permasalahan'					=> 'required',
			'penanggungjawab'				=> 'required'
		);
	}

	public function getIndex(){
		$data['me'] 	= $this->auth;
		$data['title'] 	= "E-Balsam | Permasalahan Index";
		$data['role']	= json_decode($this->auth->usergroup->access_right);
		$data['data'] 	= Permasalahan::all();

		return view( $this->view.'index', $data );
	}

	public function getDetail( $id_encrypted ){
		$id 				 = Crypt::decrypt( $id_encrypted );
		$data['me'] 		 = $this->auth;
		$data['title'] 		 = "E-Balsam | Permasalahan Detail";
		$data['role']		 = json_decode($this->auth->usergroup->access_right);
		$data['data'] 		 = Permasalahan::find( $id );
		$data['bebas']  	 = number_format((100.0 * $data['data']->lahan_bebas)/$data['data']->panjang_penanganan, 3);
		$data['belum_bebas'] = number_format( 100.0 - $data['bebas'] ,3 );
		
		return view( $this->view.'detail', $data );
	}

	public function postCreate(){
		$input = Input::all();
		$rules = $this->rules;
		$input['panjang_penanganan'] 			= str_replace(',', '.', $input['panjang_penanganan']);
		$input['lahan_yang_dapat_dikerjakan'] 	= str_replace(',', '.', $input['lahan_yang_dapat_dikerjakan']);
		$input['lahan_bebas'] 					= $input['lahan_yang_dapat_dikerjakan'];
		$input['lahan_belum_bebas'] 			= $input['panjang_penanganan'] - $input['lahan_bebas'];
		$input['permasalahan']	 				= json_encode( $input['permasalahan'] );
		$input['penanggungjawab'] 				= json_encode( $input['penanggungjawab'] );
		
		$validation = Validator::make($input, $rules);
		if( $validation->passes() ){
			$data = Permasalahan::create( $input );

			return Redirect::to( route( 'permasalahan.detail', Crypt::encrypt( $data->id ) ) );
		} else {
        	$messages = $validation->messages();

			return Redirect::back()->withInput( $input )->withErrors( $validation );
		}
	}

	public function postUpdate( $id_encrypted ){
		$id 						= Crypt::decrypt( $id_encrypted );
		$input 						= Input::all();

		$rules 	= $this->rules;
		$validation = Validator::make($input, $rules);
		if( $validation->passes() ){
			$data = Permasalahan::find( $id );
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
		$data 	= Permasalahan::find( $id );
		$data->delete();

		return Redirect::back();
	}

	public function uploadFile($id_encrypted, $path){
		$path 	= Crypt::decrypt( $path );
		$id 	= Crypt::decrypt( $id_encrypted );
		$data   = Input::file();
		$key 	= array_keys($data);
		$input 	= Input::file($key[0]);

		$peraturan= Permasalahan::find($id);
	    
	    $destinationPath  = public_path().'/'.$path;

		$filename = $path.'/'.$input->getClientOriginalName();
		$upload   = $input->move($destinationPath, $filename);

		return $this->saveDB( $id, $filename, $key[0] );
	}

	public function saveDB( $id, $filename, $key ){
		$input 		= Permasalahan::find( $id );
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
		
		$update = Permasalahan::find( $id );
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
