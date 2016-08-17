<?php
namespace App\Http\Controllers\UACL;

use App\Http\Controllers\Controller;
use Auth, Redirect, Input, Validator, Hash, Crypt;
use App\Models\User;
use App\Models\Usergroup;

class GroupController extends Controller
{
	
	function __construct()
	{
		$this->auth = Auth::user();
	}

	public function access( $input ){
		$access = array(
	    	'group'     => array(
	        	'c' => ( isset($input['group-c']) ) ? true : false,
	        	'r' => ( isset($input['group-r']) ) ? true : false,
	        	'u' => ( isset($input['group-u']) ) ? true : false,
	        	'd' => ( isset($input['group-d']) ) ? true : false
	        ),
	      	'user'      => array(
	            'c' => ( isset($input['user-c']) ) ? true : false,
	            'r' => ( isset($input['user-r']) ) ? true : false,
	            'u' => ( isset($input['user-u']) ) ? true : false,
	            'd' => ( isset($input['user-d']) ) ? true : false
	      	),
	        'location'  => array(
	            'c' => ( isset($input['location-c']) ) ? true : false,
	            'r' => ( isset($input['location-r']) ) ? true : false,
	            'u' => ( isset($input['location-u']) ) ? true : false,
	            'd' => ( isset($input['location-d']) ) ? true : false
	        ),
	        'alas_hak'  => array(
	            'c' => ( isset($input['alas_hak-c']) ) ? true : false,
	            'r' => ( isset($input['alas_hak-r']) ) ? true : false,
	            'u' => ( isset($input['alas_hak-u']) ) ? true : false,
	            'd' => ( isset($input['alas_hak-d']) ) ? true : false
	        ),
	        'dpt'       => array(
	            'c' => ( isset($input['dpt-c']) ) ? true : false,
	            'r' => ( isset($input['dpt-r']) ) ? true : false,
	            'u' => ( isset($input['dpt-u']) ) ? true : false,
	            'd' => ( isset($input['dpt-d']) ) ? true : false
	        ),
	        'notulen'   => array(
	            'c' => ( isset($input['notulen-c']) ) ? true : false,
	            'r' => ( isset($input['notulen-r']) ) ? true : false,
	            'u' => ( isset($input['notulen-u']) ) ? true : false,
	            'd' => ( isset($input['notulen-d']) ) ? true : false
	        ),
	        'peraturan'  => array(
	            'c' => ( isset($input['peraturan-c']) ) ? true : false,
	            'r' => ( isset($input['peraturan-r']) ) ? true : false,
	            'u' => ( isset($input['peraturan-u']) ) ? true : false,
	            'd' => ( isset($input['peraturan-d']) ) ? true : false
	        ),
	        'tugas'  	=> array(
	            'c' => ( isset($input['tugas-c']) ) ? true : false,
	            'r' => ( isset($input['tugas-r']) ) ? true : false,
	            'u' => ( isset($input['tugas-u']) ) ? true : false,
	            'd' => ( isset($input['tugas-d']) ) ? true : false
	        ),
	        'uu'  		=> array(
	            'c' => ( isset($input['uu-c']) ) ? true : false,
	            'r' => ( isset($input['uu-r']) ) ? true : false,
	            'u' => ( isset($input['uu-u']) ) ? true : false,
	            'd' => ( isset($input['uu-d']) ) ? true : false
	        ),
	        'apl'  		=> array(
	            'c' => ( isset($input['apl-c']) ) ? true : false,
	            'r' => ( isset($input['apl-r']) ) ? true : false,
	            'u' => ( isset($input['apl-u']) ) ? true : false,
	            'd' => ( isset($input['apl-d']) ) ? true : false
	        )
	    );

		return json_encode( $access );
	}

	public function getIndex(){
		$data ['me'] 			= $this->auth;
		$data ['title']			= "E-BalSam | Group Management";
		$data ['usergroup']		= Usergroup::all();
		$data ['role']	 		= json_decode($this->auth->usergroup->access_right);
		
		return view( 'admin.uacl.group.index', $data );
	}

	public function getCreate(){
		$html = view( 'admin.uacl.group.modal.create')->render();
		
		return $html;
	}

	public function getUpdate($id_encrypted){
		$id = Crypt::decrypt( $id_encrypted );
		$data['group'] = Usergroup::find( $id );
		$data['group']->access_right = json_decode( $data['group']['access_right'] );

		$html = view( 'admin.uacl.group.modal.update', $data)->render();
		
		return $html;
	}

	public function getDelete($id_encrypted){
		$id = Crypt::decrypt( $id_encrypted );
		$data['group'] = Usergroup::find( $id );

		$html = view( 'admin.uacl.group.modal.delete', $data)->render();
		
		return $html;
	}

	public function postCreate(){
		$input = Input::all();

		$rules = [
			'name'	=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){
			$input['access_right'] = $this->access( $input );
			$group = Usergroup::create( $input );

			return Redirect::back();
		} else {
        	$messages = $validator->messages();

			return Redirect::to()
					->withInput( $input )
					->withErrors( $validator );
		}
	}

	public function postUpdate( $id_encrypted ){
		$id 	= Crypt::decrypt( $id_encrypted );
		$input 	= Input::all();

		$rules = [
			'name'	=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){
			$group = Usergroup::find( $id );
			$group->access_right = $this->access( $input );
			$group->save();

			return Redirect::back();
		} else {
        	$messages = $validator->messages();

			return Redirect::to()
					->withInput( $input )
					->withErrors( $validator );
		}
	}

	public function doDelete($id_encrypted){
		$id = Crypt::decrypt($id_encrypted);
		$delete = Usergroup::find($id);
		$delete->delete();

		return Redirect::back();
	}
}