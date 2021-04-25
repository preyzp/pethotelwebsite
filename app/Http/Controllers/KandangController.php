<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class KandangController extends Controller
{
    public function index()
	{
		$data['kandang'] = \App\Kandang::all();
		$data['judul']  = "Data Kandang";
		return view('kandang_index',$data);
	}
	public function tambah()
	{
		$data['kandang'] 		=  new \App\Kandang();
		$data['action'] 		= 'KandangController@simpan';        
		$data['btn_submit'] 	= 'SIMPAN';
		$data['method'] 		= "POST";
		return view('kandang_tambah',$data);
	}
	public function cari(Request $ambildata)
	{
		$cari = $ambildata->get('search');
		$data['kandang']= \App\Kandang::where('type_id','LIKE','%'.$cari.'%')
										->orwhere('pethotel_id','LIKE','%'.$cari.'%')->paginate(3);
		$data['judul']  = "Data Kandang";
		return view('kandang_index',$data);
	}
}
