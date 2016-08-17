<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Auth, Redirect, Input, Validator, Hash, Crypt;
use App\Models\Banner;
use App\Models\About;
use App\Models\Agenda;
use View;	

class CMSController extends Controller
{
	public function __construct()
	{
		$this->auth = Auth::user();
	}

	public function getIndex()
	{
		$data [ 'title' ] 	= "CMS Control Panel";
		$data ['me'] 	 	= $this->auth;
		$data ['banner']	= Banner::all();
		$data ['agenda']	= Agenda::all();
		$data ['about']		= About::all();

		$data ['count']		= count($data['banner']);
		$data ['count2']	= count($data['agenda']);
		$data ['count3']	= count($data['about']);

		return View::make( 'admin.CMS.index', $data );
	}

	public function postBanner()
	{
		$input = Input::all();
		$file  = Input::file('foto');
		$rules = [
			'deskripsi'		=> 'required',
			'foto'			=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){
			$destinationPath = public_path().'/uploads';
		    $filename 		 = str_random(20).$file->getClientOriginalName();
		    $upload_success  = $file->move($destinationPath, $filename);

			$save 				= new Banner;
			$save->deskripsi 	= $input['deskripsi'];
			$save->foto 		= 'uploads/'.$filename;

			$save->save();
			
			

			return Redirect::to( route( 'cms' ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::to( route( 'cms' ) )
					->withInput( $input )
					->withErrors( $validator );
		}
	}

	public function updateBanner($id_encrypted){
			$id = Crypt::decrypt($id_encrypted);
			$input = Input::all();
			$file  = Input::file('foto');
		$rules = [
			'deskripsi'				=> 'required',
			'foto'			 		=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){
			// change usergroup -> usergroup_id
			// $input['usergroup_id'] = $input['usergroup'];
			// unset( $input['usergroup'] );
			$destinationPath = public_path().'/uploads';
		    $filename 		 = str_random(20).$file->getClientOriginalName();
		    $upload_success  = $file->move($destinationPath, $filename);

			$save = Banner::find($id);
			$save->deskripsi = $input['deskripsi'];
			$save->foto = 'uploads/'.$filename;
			$save->save();
		    
			return Redirect::to( route( 'cms' ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::to( route( 'cms' ) )
					->withInput( $input )
					->withErrors( $validator );
		}

	}

	public function deleteBanner($id_encrypted){

			$id = Crypt::decrypt($id_encrypted);
			$images = Banner::find($id);
	
			\File::delete( $images->foto );
			
			$images->delete();


  		return Redirect::back();

	}

	public function postAgenda()
	{
		$input = Input::all();
		$file  = Input::file('foto');
		$rules = [
			'kategori'		=> 'required',
			'deskripsi'		=> 'required',
			'foto'			=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){
			$destinationPath = public_path().'/uploads';
		    $filename 		 = str_random(20).$file->getClientOriginalName();
		    $upload_success  = $file->move($destinationPath, $filename);

			$save 				= new Agenda;
			$save->kategori		= $input['kategori'];
			$save->deskripsi 	= $input['deskripsi'];
			$save->foto 		= 'uploads/'.$filename;

			$save->save();
			
			

			return Redirect::to( route( 'cms' ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::to( route( 'cms' ) )
					->withInput( $input )
					->withErrors( $validator );
		}
	}

	public function updateAgenda($id_encrypted){

		$id = Crypt::decrypt($id_encrypted);
		$input = Input::all();
		$file  = Input::file('foto');
		$rules = [
			'deskripsi'				=> 'required',
			'foto'			 		=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){
			// change usergroup -> usergroup_id
			// $input['usergroup_id'] = $input['usergroup'];
			// unset( $input['usergroup'] );
			$destinationPath = public_path().'/uploads';
		    $filename 		 = str_random(20).$file->getClientOriginalName();
		    $upload_success  = $file->move($destinationPath, $filename);

			$save = Agenda::find($id);
			$save->kategori	 = $input['kategori'];
			$save->deskripsi = $input['deskripsi'];
			$save->foto = 'uploads/'.$filename;
			$save->save();
		    
			return Redirect::to( route( 'cms' ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::to( route( 'cms' ) )
					->withInput( $input )
					->withErrors( $validator );
		}

	}

	public function deleteAgenda($id_encrypted){

			$id = Crypt::decrypt($id_encrypted);
			$images = Agenda::find($id);
	
			\File::delete( $images->foto );
			
			$images->delete();


  		return Redirect::back();

	}

	public function postAbout()
	{
		$input = Input::all();
		$rules = [
			'video'			=> 'required',
			'deskripsi'		=> 'required'
		];

		$validation = Validator::make($input, $rules);

		if( $validation->passes() ){

			$save 				= new About;
			
			$save->deskripsi 	= $input['deskripsi'];
			$save->video		= $input['video'];
			$save->save();
			
			

			return Redirect::to( route( 'cms' ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::to( route( 'cms' ) )
					->withInput( $input )
					->withErrors( $validator );
		}
	}

	public function updateAbout($id_encrypted)
	{
		$id = Crypt::decrypt($id_encrypted);
		$input = Input::all();
		$rules = [
			'deskripsi'				=> 'required',
			'video'			 		=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){

			$save = About::find($id);
			$save->deskripsi = $input['deskripsi'];
			$save->video	 = $input['video'];
			$save->save();
		    
			return Redirect::to( route( 'cms' ) );
		} else {
        	$messages = $validator->messages();

			return Redirect::to( route( 'cms' ) )
					->withInput( $input )
					->withErrors( $validator );
		}
	}
}
