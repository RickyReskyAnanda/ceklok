<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class A_saran extends Controller
{
    public function index(){
    	return view('A_saran.V_saran');
    }
}
