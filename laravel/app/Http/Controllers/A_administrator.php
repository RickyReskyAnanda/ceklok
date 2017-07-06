<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\M_administrator;


class A_administrator extends Controller
{
    public function indexs(){
    	return view('A_administrator.V_administrator');
    }
    	public function show_admin_all(){
			$admin = new M_administrator;

			// $input = $request->all();
			$data = $admin->show_admin_all();
			echo json_encode($data);
    	}
    	public function create_admin_account(){
			$admin = new M_administrator;
    		echo $admin->create_admin_account();
    	}
    	public function edit_admin_account(){
			$admin = new M_administrator;
    		echo $admin->edit_admin_account();
    	}
    	public function hapus_admin_account(){
			$admin = new M_administrator;
    		echo $admin->delete_admin_account();
    	}
}
