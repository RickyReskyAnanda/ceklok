<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class H_tempat extends Controller {

	
	public function index($nama=null,$id=0)
	{
		return view('H_detail_tempat.V_detail_tempat');	
	}

}
