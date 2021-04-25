<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class TypeController extends Controller
{
    public function index()
{        
	$data['type'] = \App\Type::all();
	$data['judul']  = "Data Type Kandang";
	return view('type_index',$data);
}

public function tambah()
{
    $data['type']   = new \App\Type();
    $data['action']     = 'TypeController@simpan';        
    $data['btn_submit'] = 'SIMPAN';
    $data['method']     = "POST";
    return view('type_tambah',$data);
}
public function simpan(Request $request)
{
	$validasi = $this->validate($request,[
	'nama_type' => 'required|unique:types',            
	]);         

	\App\Type::create($request->all());
	return redirect()->back()->with('pesan', 'Data sudah disimpan!');
}

	public function hapus($id)
	{
		$type = \App\Type::findOrFail($id);
		$type->delete();		
	    return redirect('admin2/type')->with('pesan', 	'Data sudah dihapus!');
	}
	public function edit($id)
	{
	   $data['type']     = \App\Type::findOrFail($id);        
	   $data['method']     = "PUT";
	   $data['btn_submit'] = "UPDATE";
	   $data['action']     = array('TypeController@update', $id);
	   return view('type_tambah',$data);        
	}
	public function update(Request $request, $id)
	{
	   $type = \App\Type::findOrFail($id);
	   $validasi = $this->validate($request,[
	    'nama_type' => 'required|unique:types,nama_type,'.$id,
		]);
		

    $type->update($requestData);        
      
	    return redirect('admin2/type')->with('pesan', 'Data diubah!');
	}
	public function cari(Request $ambildata)
	{
		$cari = $ambildata->get('search');
		$data['type']= \App\Type::where('nama_type','LIKE','%'.$cari.'%');
		$data['judul']  = "Data Type Kandang";
		return view('type_index',$data);
	}
}
