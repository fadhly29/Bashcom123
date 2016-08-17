<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Auth, Redirect, Crypt, Input, Validator;

class LocationController extends Controller
{
	function __construct()
	{
		$this->auth 	= Auth::user();
		$this->location = array(
			'Provinsi'  => new Provinsi,
			'Kabupaten' => new Kabupaten,
			'Kecamatan' => new Kecamatan,
			'Kelurahan' => new Kelurahan
		);
	}

	public function getIndex()
	{
		$data ['me'] 	 = $this->auth;
		$data ['title']	 = "Lorikeet | Location Index";
		$data ['lokasi'] = $this->location['Provinsi']->all();
		$data ['count']	 = count( $data['lokasi'] );
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);

		return view( 'admin.location.index', $data );
	}

	public function getDetail($data_encrypted)
	{
		$lokasi = Crypt::decrypt( $data_encrypted );
		
		$data ['me'] 	 = $this->auth;
		$data ['title']	 = "Lorikeet | Location Detail";
		switch ( $lokasi['table'] ) {
			case 'loc_provinsi':
				$data ['parent'] = $this->location['Provinsi']->find($lokasi->id);
				$data ['lokasi'] = $this->location['Kabupaten']->where( 'provinsi_id', $lokasi->id )->get();
				$data ['count']	 = count( $data['lokasi'] );
				break;

			case 'loc_kabupaten':
				$data ['parent'] = $this->location['Kabupaten']->find($lokasi->id);
				$data ['lokasi'] = $this->location['Kecamatan']->where( 'kabupaten_id', $lokasi->id )->get();
				$data ['count']	 = count( $data['lokasi'] );
				break;

			case 'loc_kecamatan':
				$data ['parent'] = $this->location['Kecamatan']->find($lokasi->id);
				$data ['lokasi'] = $this->location['Kelurahan']->where( 'kecamatan_id', $lokasi->id )->get();
				$data ['count']	 = count( $data['lokasi'] );
				$data ['bottom'] = true;
				break;
		}
		$data ['role']	 = json_decode($this->auth->usergroup->access_right);
		
		return view( 'admin.location.index', $data );
	}

	public function postCreate( $data_encrypted = null )
	{
		$lokasi = ( $data_encrypted != null )?Crypt::decrypt( $data_encrypted ):null;
		$input 	= Input::all();
		
		$rules = [
			'name'				 	=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){
			switch ( $lokasi['table'] ) {
				case 'loc_provinsi':
					$this->location['Kabupaten'];
					$this->location['Kabupaten']->name 		  		= $input['name'];
					$this->location['Kabupaten']->provinsi_id 		= $lokasi->id;
					$this->location['Kabupaten']->save();
					break;

				case 'loc_kabupaten':
					$this->location['Kecamatan'];
					$this->location['Kecamatan']->name 				= $input['name'];
					$this->location['Kecamatan']->kabupaten_id = $lokasi->id;
					$this->location['Kecamatan']->save();
					break;

				case 'loc_kecamatan':
					$this->location['Kelurahan'];
					$this->location['Kelurahan']->name 				= $input['name'];
					$this->location['Kelurahan']->kecamatan_id 		= $lokasi->id;
					$this->location['Kelurahan']->save();
					break;

				default:
					$this->location['Provinsi'];
					$this->location['Provinsi']->name = $input['name'];
					$this->location['Provinsi']->save();
					break;
			}

			return Redirect::back();
		} else {
        	$messages = $validator->messages();

			return Redirect::back()
					->withErrors( $validator );
		}
	}

	public function postUpdate( $data_encrypted )
	{
		$lokasi = Crypt::decrypt( $data_encrypted );
		$input 	= Input::all();
		
		$rules = [
			'name'				 	=> 'required',
		];

		$validator = Validator::make( $input, $rules );
		if( $validator->passes() ){
			switch ( $lokasi['table'] ) {
				case 'loc_provinsi':
					$location = $this->location['Provinsi']->find( $lokasi->id );
					$location->name = $input['name'];
					$location->save();
					break;
				case 'loc_kabupaten':
					$location = $this->location['Kabupaten']->find( $lokasi->id );
					$location->name = $input['name'];
					$location->save();
					break;

				case 'loc_kecamatan':
					$location = $this->location['Kecamatan']->find( $lokasi->id );
					$location->name = $input['name'];
					$location->save();
					break;

				case 'loc_kelurahan':
					$location = $this->location['Kelurahan']->find( $lokasi->id );
					$location->name = $input['name'];
					$location->save();
					break;
			}
			
			return Redirect::back();
		} else {
			$messages = $validator->messages();

			return Redirect::back()
					->withErrors( $validator );
		}
	}

	public function getDelete( $data_encrypted )
	{
		$lokasi = Crypt::decrypt( $data_encrypted );
		switch ( $lokasi['table'] ) {
			case 'loc_provinsi':
				$location = $this->location['Provinsi']->find( $lokasi->id );
				$location->delete();
				break;
			case 'loc_kabupaten':
				$location = $this->location['Kabupaten']->find( $lokasi->id );
				$location->delete();
				break;

			case 'loc_kecamatan':
				$location = $this->location['Kecamatan']->find( $lokasi->id );
				$location->delete();
				break;

			case 'loc_kelurahan':
				$location = $this->location['Kelurahan']->find( $lokasi->id );
				$location->delete();
				break;
		}
		
		return Redirect::back();
	}
}