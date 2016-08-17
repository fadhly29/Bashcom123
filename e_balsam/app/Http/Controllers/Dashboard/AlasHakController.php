<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AlasHak;
use Auth, Redirect, Crypt, Input, Validator;

class AlasHakController extends Controller
{
	function __construct()
	{
		$this->auth 	= Auth::user();
	}

	public function getIndex()
	{
		$data ['me'] 	 = $this->auth;
		$data ['title']	 = "Alas Hak Management";
		$data ['alas'] 	 = AlasHak::all();
		$data ['count']	 = count( $data['alas'] );
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);

		return view( 'admin.alashak.index', $data );
	}

	public function postCreate()
	{
		$input 	= Input::all();
		
		$rules = [
			'name'				 	=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){
			AlasHak::create( $input );

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
		
		$rules = [
			'name'				 	=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){

			$data = AlasHak::find( $id );
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
		$lokasi = Crypt::decrypt( $id_encrypted );
		$data = AlasHak::find( $lokasi->id );
		$data->delete();
		
		return Redirect::back();
	}
}