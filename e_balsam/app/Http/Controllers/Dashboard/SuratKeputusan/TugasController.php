<?php
namespace App\Http\Controllers\Dashboard\SuratKeputusan;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Auth, Redirect, Crypt, Input, Validator, File;

class TugasController extends Controller
{
	function __construct()
	{
		$this->auth 	= Auth::user();
		$this->upload_path 	= '/uploads/surat-keputusan/tugas/';
	}

	public function getIndex(){
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);
		$data ['me'] 	 = $this->auth;
		$data ['title']	 = "E-Balsam | Surat Tugas";
		$data ['tugas']  = Tugas::all();

		return view( 'admin.surat-keputusan.tugas.index', $data );
	}

	public function getUpload( $id_encrypted ){
		$id 			= Crypt::decrypt( $id_encrypted );
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);
		$data['title'] 	= "Surat Tugas - Upload Image";
		$data['me'] 	= $this->auth;
		$data['data'] 	= Tugas::find($id);
		$data['path']	= ($data['data']->img_tugas)
						? $this->upload_path.explode('/', json_decode( $data['data']->img_tugas )[0])[4]
						: $this->upload_path.str_replace(':', '.', $data['data']->created_at);
		
		if ($data['data']->img_tugas) {
			$raw = json_decode( $data['data']->img_tugas );
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
		
		return view( 'admin.surat-keputusan.tugas.upload', $data );
	}

	public function postCreate(){
		$input 	= Input::all();
		$rules 	= [
			'nomor'			=> 'required',
			'tanggal_surat'	=> 'required',
			'tentang'		=> 'required',
			'pemberi'		=> 'required',
			'ringkas'		=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){
			$input['petugas'] = (isset( $input['petugas'] )) ? json_encode( $input['petugas'] ) : null;
			$save = Tugas::create( $input );
			
			return Redirect::route( 'tugas.images', Crypt::encrypt( $save->id ) );
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
			'nomor'			=> 'required',
			'tanggal_surat'	=> 'required',
			'tentang'		=> 'required',
			'pemberi'		=> 'required',
			'ringkas'		=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){
			$data = Tugas::find( $id );
			$data->nomor 		 = $input['nomor'];
			$data->tanggal_surat = $input['tanggal_surat'];
			$data->tentang 		 = $input['tentang'];
			$data->pemberi 		 = $input['pemberi'];
			$data->ringkas 		 = $input['ringkas'];
			$data->petugas	 	 = (isset( $input['petugas'] )) ? json_encode( $input['petugas'] ) : $data->petugas;
			$data->save();
			
			return Redirect::route( 'tugas.images', Crypt::encrypt( $data->id ) );
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

		$peraturan= Tugas::find($id);
	    
	    $destinationPath  = public_path().'/'.$path;

		$filename = $path.'/'.$input->getClientOriginalName();
		$upload   = $input->move($destinationPath, $filename);

		return $this->saveDB( $id, $filename, $key[0] );
	}

	public function saveDB( $id, $filename, $key ){
		$input 		= Tugas::find( $id );

		$field = 'img_tugas';
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
		
		$update = Tugas::find( $id );
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
		$del = Tugas::find($id);

		$img['img_tugas']	= ( $del['img_tugas'] )?json_decode( $del->img_tugas ):null;

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
