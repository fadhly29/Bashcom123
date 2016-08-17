<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bentuk;
use App\Models\Jenis;
use Auth, Redirect, Crypt, Input, Validator, Route;

class PenggantianController extends Controller
{
	function __construct()
	{
		$this->route = Route::getCurrentRoute()->getPath();
		$this->auth  = Auth::user();
		$this->title = ( $this->route == 'dashboard/bentuk-penggantian' )?"Bentuk Pergantian Management" :"Jenis Pergantian Management" ;
		$this->data  = ( $this->route == 'dashboard/bentuk-penggantian' )?Bentuk::all() :Jenis::all() ;
		$this->view  = ( $this->route == 'dashboard/bentuk-penggantian' )?"admin.bentuk.index" :"admin.jenis.index" ;
	}

	public function getIndex(){
		$data ['title']	 = $this->title;
		$data ['data'] 	 = $this->data;
		$data ['me'] 	 = $this->auth;
		$data ['count']	 = count( $data['data'] );
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);

		return view( $this->view, $data );
	}

	public function postCreate()
	{
		$input 	= Input::all();
		
		$rules = ['name' => 'required',];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){
			$input = ($this->route == 'dashboard/bentuk-penggantian/create')
			?Bentuk::create( $input )
			:Jenis::create( $input );

			return Redirect::back();
		} else {
        	$messages = $validator->messages();

			return Redirect::back()
					->withErrors( $validator );
		}
	}

	public function postUpdate( $id_encrypted )
	{
		$id 	= Crypt::decrypt( $id_encrypted );
		$input 	= Input::all();
		
		$rules = ['name' => 'required'];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){

			$data = ($this->route == 'dashboard/bentuk-penggantian/update/{data}')
			?Bentuk::find( $id )
			:Jenis::find( $id );
			$data->name = $input['name'];
			$data->save();

			return Redirect::back();
		} else {
			$messages = $validator->messages();

			return Redirect::back()
					->withErrors( $validator );
		}
	}

	public function getDelete( $id_encrypted )
	{
		$id   = Crypt::decrypt( $id_encrypted );
		$data = ($this->route == 'dashboard/bentuk-penggantian/delete/{data}')
		?Bentuk::find( $id->id )
		:Jenis::find( $id->id );
		$data->delete();
		
		return Redirect::back();
	}
}