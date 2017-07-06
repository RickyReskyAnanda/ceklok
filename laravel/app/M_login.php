<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class M_login extends Model
{
   
   public function select_data_login($data){
	   	$user = DB::table('table_admin')->where('no_telp',$data['username'])->get();
	   	return $user;
   }
}
