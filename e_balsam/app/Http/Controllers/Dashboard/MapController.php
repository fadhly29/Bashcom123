<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Auth, Redirect, Input, Validator, Hash, Crypt;
use App\Models\Banner;
use App\Models\About;
use App\Models\Agenda;
use View;	

class MapController extends Controller
{
	public function __construct()
	{
		$this->auth = Auth::user();
	}

	public function getIndex()
	{
		$data [ 'title' ] 	= "Web Map";
		$data ['me'] 	 	= $this->auth;

		return view( 'admin.webmap.index', $data );
	}

	public function getMap()
	{
		$data ['me'] 	 	= $this->auth;
		return view( 'admin.webmap.map', $data );
	}

}
