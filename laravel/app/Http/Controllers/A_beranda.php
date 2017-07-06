<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class A_beranda extends Controller
{
    public function index(){
    	return view('A_beranda.V_beranda');
    }
}
