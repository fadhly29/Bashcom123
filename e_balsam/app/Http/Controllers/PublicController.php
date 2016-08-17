<?php
namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Agenda;
use App\Models\About;

class PublicController extends Controller
{
	
	function __construct()
	{
		# code...
	}

	public function getIndex()
	{
		$data ['title']		= "E-Balsam Under Construction";
		$data ['banner']	= Banner::all();
		$data ['agenda']	= Agenda::all();
		$data ['about']		= ABout::all();

		return view('pages.index', $data);
	}
}