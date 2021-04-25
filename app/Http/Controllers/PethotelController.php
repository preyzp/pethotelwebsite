<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class PethotelController extends Controller
{
    public function index()
	{
		$data['pethotel'] = \App\Pethotel::all();
		$data['judul']  = "Data Pethotel";
		return view('pethotel_index',$data);
	}
	public function tambah()
	{
		$data['pethotel'] 		=  new \App\pethotel();
		$data['action'] 		= 'PethotelController@simpan';        
		$data['btn_submit'] 	= 'SIMPAN';
		$data['method'] 		= "POST";
		return view('pethotel_tambah',$data);
	}

	public function simpan(Request $request)
	{
		$validasi = $this->validate($request,[
		'email' => 'required|email|unique:pethotels',
		'password' => 'required',
		'nama_pemilik' => 'required',
		'jenis_kelamin' => 'required',
		'foto_ktp' => 'required|file|mimes:png,jpg,jpeg,gif',
		'nama_pethotel' => 'required',
		'alamat_pethotel' => 'required',
		'telp' => 'required',
		'foto' => 'required|file|mimes:png,jpg,jpeg,gif',
		'foto2' => 'required|file|mimes:png,jpg,jpeg,gif',
		'kategori_pethotel' => 'required',            
		]);         
		$file_nama             = $request->file('foto_ktp')->store('public/gambar');
		$file_nama             = $request->file('foto')->store('public/gambar');
		$file_nama             = $request->file('foto2')->store('public/gambar');
	    $requestData           = $request->except('password_confirmation');
	    $requestData['password'] = Hash::make($request->password);
	    $requestData['foto_ktp'] = $file_nama;
	    $requestData['foto'] = $file_nama;
	    $requestData['foto2'] = $file_nama;
	    \App\Pethotel::create($requestData);
		return redirect()->back()->with('pesan', 'Data sudah disimpan!');

		//avatars=public/gambar
		//avatar=foto
		

	
	}
	public function hapus($id)
	{
		$pethotel = \App\Pethotel::findOrFail($id);
		$pethotel->delete();		
	    return redirect('admin2/pethotel')->with('pesan', 	'Data sudah dihapus!');
	}
	public function edit($id)
	{
	   $data['pethotel']   = \App\Pethotel::findOrFail($id);        
	   $data['method']     = "PUT";
	   $data['btn_submit'] = "UPDATE";
	   $data['action']     = array('PethotelController@update', $id);
	   return view('pethotel_tambah',$data);        
	}
	public function update(Request $request, $id)
	{
	   $pethotel = \App\Pethotel::findOrFail($id);
	   $validasi = $this->validate($request,[
	    'email' => 'required|email',
		'password' => 'required',
		'nama_pemilik' => 'required',
		'jenis_kelamin' => 'required',
		'foto_ktp' => 'required|file|mimes:png,jpg,jpeg,gif',
		'nama_pethotel' => 'required',
		'alamat_pethotel' => 'required',
		'telp' => 'required',
		'foto' => 'required|file|mimes:png,jpg,jpeg,gif',
		'foto2' => 'required|file|mimes:png,jpg,jpeg,gif',
		'kategori_pethotel' => 'required',      
	    ]);
	$datagambar = $pethotel->foto_ktp;
	$datagambar = $pethotel->foto;
	$datagambar = $pethotel->foto2;	    
    @\Storage::delete($datagambar);

	$file_nama             = $request->file('foto_ktp')->store('public/gambar');
		$file_nama             = $request->file('foto')->store('public/gambar');
		$file_nama             = $request->file('foto2')->store('public/gambar');
	    $requestData           = $request->except('password_confirmation');
	    $requestData['password'] = Hash::make($request->password);
	    $requestData['foto_ktp'] = $file_nama;
	    $requestData['foto'] = $file_nama;
	    $requestData['foto2'] = $file_nama;

    $pethotel->update($requestData);        
      
	    return redirect('admin2/pethotel')->with('pesan', 'Data diubah!');
	}
	public function cari(Request $ambildata)
	{
		$cari = $ambildata->get('search');
		$data['pethotel']= \App\Pethotel::where('nama_pethotel','LIKE','%'.$cari.'%')
										->orwhere('kategori_pethotel','LIKE','%'.$cari.'%')->paginate(3);
		$data['judul']  = "Data Pethotel";
		return view('pethotel_index',$data);
	}
	public function formLogin()
	{    
	$data['action']     = 'PethotelController@prosesLogin';            
    $data['method']     = "POST";
    $data['btn_submit'] = "Login";
    return view('login_adminph',$data);
	}

public function prosesLogin(Request $request)
{
	$this->validate($request, [
       'email'   => 'required|email',
       'password' => 'required|min:2'
    ]);

    //Auth::guard melakukan pengecekkan data di tabel  	      	     
    if(Auth::guard('adminph')->attempt(['email' => $request->email, 'password' => $request->password]))
    {        
    	//jika ada maka akan diarahkan ke route peserta/dashboard, 
        return redirect('adminph/dashboard');
    }
    else 
    {
    	//jika gagal maka akan diarahkan kembali ke halaman login.
    	return back()->with('pesan','login gagal');          	
    }                
}

public function dashboard(Request $request)
{
    //mendapatkan id dari peserta yang telah login
    $pethotel_id = Auth::guard('adminph')->user()->id;

    return view('dashboard_adminph');
}

  //untuk tampilan adminph
  public function indexadminph()
    {
            $data['pethotel'] = \App\Pethotel::all();
            $data['judul']  = "Profil Pethotel";
            return view('pethotel_adminphindex',$data);
    }

        public function tambahadminph()
	{
		$data['pethotel'] 		=  new \App\pethotel();
		$data['action'] 		= 'PethotelController@simpan';        
		$data['btn_submit'] 	= 'SIMPAN';
		$data['method'] 		= "POST";
		return view('pethotel_adminphtambah',$data);
	}

      public function editadminph($id)
	{
	   $data['pethotel']   = \App\Pethotel::findOrFail($id);        
	   $data['method']     = "PUT";
	   $data['btn_submit'] = "UPDATE";
	   $data['action']     = array('PethotelController@updateadminph', $id);
	   return view('pethotel_adminphtambah',$data);        
	}
	public function updateadminph(Request $request, $id)
	{
	   $pethotel = \App\Pethotel::findOrFail($id);
	   $validasi = $this->validate($request,[
	    'email' => 'required|email',
		'password' => 'required',
		'nama_pemilik' => 'required',
		'jenis_kelamin' => 'required',
		'foto_ktp' => 'required|file|mimes:png,jpg,jpeg,gif',
		'nama_pethotel' => 'required',
		'alamat_pethotel' => 'required',
		'telp' => 'required',
		'foto' => 'required|file|mimes:png,jpg,jpeg,gif',
		'foto2' => 'required|file|mimes:png,jpg,jpeg,gif',
		'kategori_pethotel' => 'required',      
	    ]);
	$datagambar = $pethotel->foto_ktp;
	$datagambar = $pethotel->foto;
	$datagambar = $pethotel->foto2;	    
    @\Storage::delete($datagambar);

	$file_nama             = $request->file('foto_ktp')->store('public/gambar');
	$file_nama             = $request->file('foto')->store('public/gambar');
	$file_nama             = $request->file('foto2')->store('public/gambar');
	$requestData           = $request->except('password_confirmation');
	$requestData['password'] = Hash::make($request->password);    
    $requestData['foto_ktp'] = $file_nama;
	$requestData['foto'] = $file_nama;
	$requestData['foto2'] = $file_nama;

    $pethotel->update($requestData);        
      
	    return redirect('adminph/pethotel')->with('pesan', 'Data diubah!');
	}
	
	//untuk tampilan kandang
	
	public function indexkandang()
	{
		$pethotel = Auth::guard('adminph')->user()->id;
        //coding dibawah digunakan untuk mengambil data booking terbaru berdasarkan member id yang login
            $data['kandang'] = \App\Kandang::where('pethotel_id',$pethotel)->get();
            $data['pethotel_id'] = $pethotel;
            $data['judul']  = "Kandang";
            return view('kandang_adminphindex',$data);
		//$data['kandang'] = \App\Kandang::all();
		//$data['judul']  = "Data Kandang";
		//return view('kandang_adminphindex',$data);
	}
	public function tambahkandang()
	{
		$data['kandang'] 		=  new \App\kandang();
		$data['action'] 		= 'PethotelController@simpankandang';        
		$data['btn_submit'] 	= 'SIMPAN';
		$data['method'] 		= "POST";
		return view('kandang_tambahadminph',$data);
	}

      public function editkandang($id)
	{
	   $data['kandang']   = \App\Kandang::findOrFail($id);        
	   $data['method']     = "PUT";
	   $data['btn_submit'] = "UPDATE";
	   $data['action']     = array('PethotelController@updatekandang', $id);
	   return view('kandang_tambahadminph',$data);        
	}
	public function updatekandang(Request $request, $id)
	{
		$pethotel = Auth::guard('adminph')->user()->id;
	   $kandang = \App\Kandang::findOrFail($id);
	   $validasi = $this->validate($request,[
		'type_id' => 'required',
		'deskripsi' => 'required',
		'harga' => 'required',
		'jumlah_kandang' => 'required',
		]);
		$kandang->pethotel_id = $pethotel;
		$kandang->type_id = $request->type_id;
		$kandang->deskripsi = $request->deskripsi;
		$kandang->harga = $request->harga;
		$kandang->jumlah_kandang = $request->jumlah_kandang;
		
		$kandang->save();
      
	    return redirect('adminph/kandang')->with('pesan', 'Data diubah!');
	}
	public function simpankandang(Request $request)
{
		$pethotel = Auth::guard('adminph')->user()->id;
	  
	   	$validasi = $this->validate($request,[
		'type_id' => 'required',
		'deskripsi' => 'required',
		'harga' => 'required',
		'jumlah_kandang' => 'required',
		]);
		$kandang = new \App\Kandang();
		$kandang->pethotel_id = $pethotel;
		$kandang->type_id = $request->type_id;
		$kandang->deskripsi = $request->deskripsi;
		$kandang->harga = $request->harga;
		$kandang->jumlah_kandang = $request->jumlah_kandang;
		$kandang->save();

		
		return redirect()->back()->with('pesan', 'Data sudah disimpan!');
}

	

	//untuk tampilan booking
	public function indexbooking()
	{
		$pethotel = Auth::guard('adminph')->user()->id;
		$data['booking'] = \App\Booking::selectRaw('bookings.id as idbooking, bookings.*,kandangs.*')->join('kandangs','bookings.kandang_id','=','kandangs.id')->where('kandangs.pethotel_id',$pethotel)->latest()->paginate(5);
		$data['pethotel_id'] = $pethotel;
		$data['judul']  = "Data Booking";
		return view('booking_adminphindex',$data);
	}
	public function editbooking($id)
    {
		
		$ubahbooking = \App\Booking::findOrFail($id);
		

		$ubahbooking->status = 'Telah Dikonformasi';
		


		$booking = \App\Booking::findOrFail($id)->get('kandang_id')->first();
		$kandang = \App\Kandang::findOrFail($booking)->first();
		$jumlah = $kandang->jumlah_kandang - 1;
		$kandang->jumlah_kandang = $jumlah;
		$kandang->save();
		$ubahbooking->save();
		
		return back()->with('pesan','Telah Dikonfirmasi');
	}
	public function outbooking($id)
    {
		$outbooking = \App\Booking::findOrFail($id);
		$outbooking->status = 'Telah CheckOut';
		


		$booking = \App\Booking::findOrFail($id)->get('kandang_id')->first();
		$kandang = \App\Kandang::findOrFail($booking)->first();
		$jumlah = $kandang->jumlah_kandang + 1;
		$kandang->jumlah_kandang = $jumlah;
		$kandang->save();
		$outbooking->save();
		
		return back()->with('pesan','Telah CheckOut');
	}
	
	public function hapusbooking($id)
    {
		$booking = \App\Booking::findOrFail($id);
		$booking->delete();		
		return back()->with('pesan','Booking Dihapus');
	}
	
	/*public function caribooking((Request $ambildata)
    {
        $cari = $ambildata->get('search');
        $data['booking']= \App\Booking::join('kandangs','bookings.kandang_id','=','kandangs.id')->where('kandangs.type_id','LIKE','%'.$cari.'%'));
        $data['judul']  = "Data Type Kandang";
        return view('type_adminindex',$data);
    }*/
	


	 public function indexadmin1()
    {
        $data['admin'] = \App\Admin::all();
        $data['judul']  = "Data Admin";
        return view('admin_adminphindex',$data);
    }
}
