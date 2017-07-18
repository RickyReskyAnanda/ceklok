<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class M_H_pencarian extends Model
{
	public static function tampil_data_pencarian_gedung(){
		$search = $_GET['search'];
	    return DB::table('tabel_gedung')
                ->where('nama_gedung', 'like', "%$search%")
                ->get();
    }

    public static function tampil_data_cari_gedung(){
        $val = explode(',', $_GET['sData']);
        $data['nama_gedung'] = $val[0];
        $data['urutan']      = $val[1];
        $data['star']        = $val[2];
        $data['kapasitas']   = $val[3];//kapasitas menggunakan angka sebagai urutan pilihan

        $hasil = array();
        // print_r($data);
        if($data['nama_gedung']!=""){
        	$hasil['nama_gedung'] = DB::table('tabel_gedung')
                                    ->where('nama_gedung', 'like', "%$search%")
                                    ->get();
        }

        if ($data['urutan']=="pop") {
            $hasil['urutan'] = DB::table('tabel_gedung')
                                        ->where('nama_gedung', 'like', "%$search%")
                                        ->get();
        }
    }
}
