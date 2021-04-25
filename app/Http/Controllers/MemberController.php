<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class MemberController extends Controller
{
     public function index()
    {
        $data['member'] = \App\Member::all();
        $data['judul']  = "Data Member";
        return view('member_index',$data);
    }
    public function cari(Request $ambildata)
    {
        $cari = $ambildata->get('search');
        $data['member']= \App\Member::where('nama','LIKE','%'.$cari.'%')
                                        ->orwhere('email','LIKE','%'.$cari.'%')->paginate(3);
        $data['judul']  = "Data member";
        return view('member_index',$data);
    }

    public function daftar()
    {       
	    $data['member'] 	= new \App\Member;               
        $data['action']     = 'MemberController@simpan';            
        $data['method']     = "POST";
        $data['btn_submit'] = "DAFTAR";
        return view('front_daftar_member',$data);
    }

    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,[
        'nama'          => 'required',
        'email'         => 'required|email|unique:members',
        'no_hp'         => 'required|numeric',
        'password'      => 'required',
        'password_confirmation' => 'required|same:password',            
        ]);
        $requestData                = $request->except('password_confirmation');
        $requestData['password'] = Hash::make($request->password);
        \App\Member::create($requestData);        
    return redirect('member/form-login')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $member = \App\Member::findOrFail($id);
        $member->delete();     
        return redirect('admin2/member')->with('pesan',     'Data sudah dihapus!');
    }
    public function formLogin()
    {    
    	$data['action']     = 'MemberController@prosesLogin';            
        $data['method']     = "POST";
        $data['btn_submit'] = "Login";
        return view('front_login',$data);
    }

    public function prosesLogin(Request $request)
    {
    	$this->validate($request, [
           'email'   => 'required|email',
           'password' => 'required|min:3'
        ]);

        	      	     
        if(Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password]))
        {        
        	 
            return redirect('member/dashboard');
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
        $member_id = Auth::guard('member')->user()->id;

        
        $data['member'] = \App\Member::All();

        return view('front_dashboard',$data);
    }

     public function tambahbooking($id)
    {       
        $data['kandang'] = \App\Kandang::with('type')->where('pethotel_id', $id)->get();
  		$data['pethotel'] = \App\Pethotel::findOrFail($id);
        $data['booking']    = new \App\Booking;               
        $data['action']     = 'MemberController@simpanbooking';            
        $data['method']     = "POST";
        $data['btn_submit'] = "Booking";
        return view('front_booking_pethotel',$data)->with('pesan', 'Data sudah disimpan!');
    }
    
     public function bookingLogin()
    {    
        if(\Auth::guard('member')->check()){
            return redirect ('member/booking/tambah');
        }
        else{
            return redirect('member/form-login')->with('pesan', 'Silahkan melakukan login/daftar terlebih dahulu!');
        }
        $data['action']     = 'MemberController@prosesLogin';            
        $data['method']     = "POST";
        $data['btn_submit'] = "Login";
        return view('front_login',$data);
    }
     public function simpanbooking(Request $request)
    {
        
        
        $request->validate{[
        'pethotel_id'           => 'required',    
        'kandang_id'            => 'required',
        'tgl_checkin'           => 'required|date',
        'lama_inap'             => 'required',
        'total_harga'           => 'required',
        ]
        };
        $member_id = \Auth::guard('member')->user()->id;
        
        $data['member'] = \App\Member::All();
        //return view('front_booking_pethotel',$data);

        $kandang = \App\Kandang::where('id',$request->kandang_id)->first();
        $harga = $kandang->harga;
        $total_harga = $harga * $request->lama_inap;

        $booking = new \App\Booking();
        $booking->pethotel_id = $request->pethotel_id;
        $booking->member_id   = $member_id;
        $booking->kandang_id  = $request->kandang_id;
        $booking->tgl_checkin = $request->tgl_checkin;
        $booking->lama_inap   = $request->lama_inap;
        $booking->total_harga = $total_harga;
        $booking->status      = 'Belum Konfirmasi';
     
           
        $booking->save();

        //$datakandang = new \App\Kandang('id',$booking->kandang_id);

        //$kandang = $datakandang::where('id',$booking->kandang_id)->first()->get(); 
        //$datakandang->jumlah_kandang - 1;
        //$datakandang->save();

        
        return redirect('member/booking/hasil')->with('pesan', 'Booking Berhasil!');
        
    }
        public function indexbookingmember()
        {
        $member_id = Auth::guard('member')->user()->id;
        //coding dibawah digunakan untuk mengambil data booking terbaru berdasarkan member id yang login
        $data['booking'] = \App\Booking::where('member_id',$member_id)->get();
        $data['member_id'] = $member_id;   
        $data['judul']  = "Data Booking Member";
        return view('front_bookingmember_pethotel',$data);
        }
        public function profilmember()
        {
            $data['member'] = \App\Member::all();
            $data['judul']  = "Profil Member";
            return view('front_profilmember_pethotel',$data);
    

        }
        public function editmember($id)
        {
           $data['member']   = \App\Member::findOrFail($id);        
           $data['method']     = "PUT";
           $data['btn_submit'] = "UPDATE";
           $data['action']     = array('MemberController@updatemember', $id);
           return view('front_editprofil_member',$data);        
        }
        public function updatemember(Request $request, $id)
        {
           $member = \App\Member::findOrFail($id);
           $validasi = $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
            'no_hp' => 'required',
            ]);
        $requestData           = $request->except('password_confirmation');
        $requestData['password'] = Hash::make($request->password);    
        
        $member->update($requestData);        
          
            return redirect('member/profil/member')->with('pesan', 'Data diubah!');
        }

        public function hasilbooking()
        {
            $member_id = Auth::guard('member')->user()->id;
            //coding dibawah digunakan untuk mengambil data booking terbaru berdasarkan member id yang login
            $data['booking'] = \App\Booking::where('member_id',$member_id)->latest('tgl_checkin')->get()->first();
            $data['member_id'] = $member_id;
            $data['judul']  = "Data Booking";
            return view('front_hasilbooking',$data);
        }


    
}
