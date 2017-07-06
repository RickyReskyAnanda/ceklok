<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_administrator extends Model
{
   	public function show_admin_all(){
	   	// $user = DB::table('table_admin')->where('no_telp',$data['username'])->get();
	   	$data = DB::table('table_admin')->orderBy('id_admin', 'asc')->get();
	   	return $data;
   	}
   	public function create_admin_account(){

	   	DB::table('table_admin')
		   		->insert([	'nama' 		=> $_POST['nama'], 
			    			'no_telp' 	=> $_POST['nope'],
			    			'password' 	=> md5(md5($_POST['pass']).md5($_POST['pass']).'xyzabc')
						]);
		return 'success';
   	}
   	public function edit_admin_account(){
   		$data['nama'] = $_POST['nama'];
   		$data['no_telp'] = $_POST['nope'];
   		if(isset($_POST['pass'])==true || $_POST['pass']!="-" || $_POST['pass']!=""){
   			$data['password'] = md5(md5($_POST['pass']).md5($_POST['pass']).'xyzabc');
   		}

   		DB::table('table_admin')->where('id_admin',$_POST['ex'])->update($data);
	    return 'success';
   	}
   	public function delete_admin_account(){
   		DB::table('table_admin')->where('id_admin',$_POST['ex'])->delete();
	    return 'success';
   	}
}