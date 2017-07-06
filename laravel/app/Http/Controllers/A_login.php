<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Auth;

use App\M_login;

class A_login extends Controller
{
    public function index(){
	    return view('A_login.V_login');
	}
	public function doLogin(Request $request){
		$login = new M_login;

		$input = $request->all();
		$data = $login->select_data_login($input);

		if(count($data)==1 && $data[0]->no_telp==$input['username']){
			$request->session()->put($data);
			return redirect('admin/beranda')->with('success','Selamat Datang di Dashboard');
		}else{
			return redirect()->back()->with('danger','Username atau password anda salah');
		}

		// $password = $request->input('password');
		// $input['password'] = $password;
		  // $input['activation_code'] = str_random(60) . $request->input('email');
		  // $register = User::create($input);
		 
		  // $data = [
		  //  'name' => $input['name'],
		  //  'code' => $input['activation_code']
		  // $this->sendEmail($data, $input);
		  // ];
	}
}
