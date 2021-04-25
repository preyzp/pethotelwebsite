<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class HasilcariController extends Controller
{
	  public function index()
	{
		$data['pethotel'] = \App\Pethotel::all();
		$data['member'] = \App\Member::all();
		return view('front_hasilcari_pethotel', $data);		
	}
  	
  	public function detail($id)
  	{
  		$data['kandang'] = \App\Kandang::with('type')->where('pethotel_id', $id)->get();
  		$data['pethotel'] = \App\pethotel::findOrFail($id);

  		return view('front_detail_pethotel',$data);
  	}
		
  	public function tambah()
  	{
  	
  		$data['booking'] 		=  new \App\Booking();
		$data['action'] 		= 'HasilcariController@simpan';        
		$data['btn_submit'] 	= 'SIMPAN';
		$data['method'] 		= "POST";

  		return view('front_detail_pethotel',$data);
  	}

  	
  	
}
