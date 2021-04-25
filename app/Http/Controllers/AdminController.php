<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
	public function index()
	{
		$data['admin'] = \App\Admin::all();
		$data['judul']  = "Data Admin";
		return view('admin_index',$data);
	}
    public function daftar()
    {       
    	$data['admin'] 	= new \App\Admin;               
        $data['action']     = 'AdminController@simpan';            
        $data['method']     = "POST";
        $data['btn_submit'] = "DAFTAR";
        return view('daftar_admin',$data);
    }

	public function simpan(Request $request)
	{
    $validasi = $this->validate($request,[
        'name'          => 'required',
        'email'         => 'required|email|unique:admins',
        'password'      => 'required',
        'password_confirmation' => 'required|same:password',            
    ]);
    $requestData                = $request->except('password_confirmation');
    $requestData['password'] = Hash::make($request->password);
    \App\Admin::create($requestData);        
    return view('admin_index')->with('pesan', 'Data sudah disimpan!');
	}
    public function cari(Request $ambildata)
    {
        $cari = $ambildata->get('search');
        $data['admin']= \App\Admin::where('name','LIKE','%'.$cari.'%')
                                        ->orwhere('email','LIKE','%'.$cari.'%')->paginate(3);
        $data['judul']  = "Data Admin";
        return view('admin_index',$data);
    }
    public function hapus($id)
    {
        $admin = \App\Admin::findOrFail($id);
        $admin->delete();        
        return redirect('admin2/admin')->with('pesan',   'Data sudah dihapus!');
    }
    public function edit($id)
    {
       $data['admin']     = \App\Admin::findOrFail($id);        
       $data['method']     = "PUT";
       $data['btn_submit'] = "UPDATE";
       $data['action']     = array('AdminController@update', $id);
       return view('daftar_admin',$data);        
    }
    public function update(Request $request, $id)
    {
       $admin = \App\Admin::findOrFail($id);
       $validasi = $this->validate($request,[
        'name'          => 'required',
        'email'         => 'required',
        'password'      => 'required',
        'password_confirmation' => 'required|same:password',  
        ]);
        $requestData             = $request->except('password_confirmation');
        $requestData['password'] = Hash::make($request->password);
        $admin->update($requestData);        
        return redirect('admin2/admin')->with('pesan', 'Data diubah!');
    }
	 public function formLogin()
    {    
    	$data['action']     = 'AdminController@prosesLogin';            
        $data['method']     = "POST";
        $data['btn_submit'] = "Login";
        return view('login_admin',$data);
    }
     public function prosesLogin(Request $request)
    {
    	$this->validate($request, [
           'email'   => 'required|email',
           'password' => 'required|min:3'
        ]);

        //Auth::guard melakukan pengecekkan data di tabel peserta 	      	     
        if(Auth::guard('admin1')->attempt(['email' => $request->email, 'password' => $request->password]))
        {        
        	//jika ada maka akan diarahkan ke route peserta/dashboard, 
            return redirect('admin1/dashboard');
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
        $admin_id = Auth::guard('admin1')->user()->id;

        
        $data['admin1'] = \App\Admin::All();

        return view('dashboard_admin',$data);
    	}
         

        
         //untuk pethotel
         public function indexadmin()
        {
            $data['pethotel'] = \App\Pethotel::all();
            $data['judul']  = "Data Pethotel";
            return view('pethotel_adminindex',$data);
        }
        public function tambahadmin()
        {
            $data['pethotel']       =  new \App\pethotel();
            $data['action']         = 'PethotelController@simpan';        
            $data['btn_submit']     = 'SIMPAN';
            $data['method']         = "POST";
            return view('pethotel_admintambah',$data);
        }

        public function simpanadmin(Request $request)
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
        
        }
        public function hapusadmin($id)
        {
            $pethotel = \App\Pethotel::findOrFail($id);
            $pethotel->delete();        
            return redirect('admin1/pethotel')->with('pesan',   'Data sudah dihapus!');
        }
        public function editadmin($id)
        {
           $data['pethotel']     = \App\Pethotel::findOrFail($id);        
           $data['method']     = "PUT";
           $data['btn_submit'] = "UPDATE";
           $data['action']     = array('AdminController@updateadmin', $id);
           return view('pethotel_admintambah',$data);        
        }
        public function updateadmin(Request $request, $id)
        {
           $pethotel = \App\Pethotel::findOrFail($id);
           $validasi = $this->validate($request,[
            'email' => 'required',
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
        $requestData           = $request->all();
        $requestData['foto_ktp'] = $file_nama;
        $requestData['foto'] = $file_nama;
        $requestData['foto2'] = $file_nama;
        $requestData             = $request->except('password_confirmation');
        $requestData['password'] = Hash::make($request->password);

        $pethotel->update($requestData);        
          
            return redirect('admin1/pethotel')->with('pesan', 'Data diubah!');
        }
        public function cariadmin(Request $ambildata)
        {
            $cari = $ambildata->get('search');
            $data['pethotel']= \App\Pethotel::where('nama_pethotel','LIKE','%'.$cari.'%')
                                            ->orwhere('kategori_pethotel','LIKE','%'.$cari.'%')->paginate(3);
            $data['judul']  = "Data Pethotel";
            return view('pethotel_adminindex',$data);
        }

        //untuk type
        
         public function indextype()
{        
    $data['type'] = \App\Type::all();
    $data['judul']  = "Data Type Kandang";
    return view('type_adminindex',$data);
}

public function tambahtype()
{
    $data['type']   = new \App\Type();
    $data['action']     = 'AdminController@simpantype';        
    $data['btn_submit'] = 'SIMPAN';
    $data['method']     = "POST";
    return view('type_admintambah',$data);
}
public function simpantype(Request $request)
{
    $validasi = $this->validate($request,[
    'nama_type' => 'required|unique:types',            
    ]);         

    \App\Type::create($request->all());
    return redirect()->back()->with('pesan', 'Data sudah disimpan!');
}

    public function hapustype($id)
    {
        $type = \App\Type::findOrFail($id);
        $type->delete();        
        return redirect('admin1/type')->with('pesan',   'Data sudah dihapus!');
    }
    public function edittype($id)
    {
       $data['type']     = \App\Type::findOrFail($id);        
       $data['method']     = "PUT";
       $data['btn_submit'] = "UPDATE";
       $data['action']     = array('AdminController@updatetype', $id);
       return view('type_tambahadmin',$data);        
    }
    public function updatetype(Request $request, $id)
    {
       $type = \App\Type::findOrFail($id);
       $validasi = $this->validate($request,[
        'nama_type' => 'required|unique:types,nama_type,'.$id,
        ]);
        

    $type->update($requestData);        
      
        return redirect('admin1/type')->with('pesan', 'Data diubah!');
    }
    public function caritype(Request $ambildata)
    {
        $cari = $ambildata->get('search');
        $data['type']= \App\Type::where('nama_type','LIKE','%'.$cari.'%');
        $data['judul']  = "Data Type Kandang";
        return view('type_adminindex',$data);
    }

    //untuk data member
    
    public function indexmember()
    {
        $data['member'] = \App\Member::all();
        $data['judul']  = "Data Member";
        return view('member_adminindex',$data);
    }
    public function carimember(Request $ambildata)
    {
        $cari = $ambildata->get('search');
        $data['member']= \App\Member::where('nama','LIKE','%'.$cari.'%')
                                        ->orwhere('email','LIKE','%'.$cari.'%')->paginate(3);
        $data['judul']  = "Data member";
        return view('member_adminindex',$data);
    }
     public function hapusmember($id)
    {
        $member = \App\Member::findOrFail($id);
        $member->delete();     
        return redirect('admin1/member')->with('pesan',     'Data sudah dihapus!');
    }

    //untuk menampilkan admin
             
        public function indexadmin1()
    {
        $data['admin'] = \App\Admin::all();
        $data['judul']  = "Data Admin";
        return view('admin_adminindex',$data);
    }

    //untuk kandang
    
    public function indexkandang()
    {
        $data['kandang'] = \App\Kandang::all();
        $data['judul']  = "Data Kandang";
        return view('kandang_adminindex',$data);
    }

    public function indexbooking()
    {
        $data['booking'] = \App\Booking::all();
        $data['judul']  = "Data Booking";
        return view('booking_adminindex',$data);
    }
}

