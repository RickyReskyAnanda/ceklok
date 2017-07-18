<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\M_H_pencarian as mcari;
use Illuminate\Http\Request;

class H_pencarian extends Controller {


	public function index()
	{
		$data = mcari::tampil_data_pencarian_gedung();
		return view('H_pencarian.V_pencarian',['data'=>$data]);
	}

	public function view_pencarian(){
		mcari::tampil_data_cari_gedung();
		// echo json_encode($data);
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	
	public function show($id)
	{
		//
	}

	
	public function edit($id)
	{
		//
	}

	
	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
