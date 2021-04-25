<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('admin2')->middleware('admin')->group(function(){	
	Route::get('pethotel','PethotelController@index');  	
	Route::get('pethotel/tambah','PethotelController@tambah');  
	Route::post('pethotel/simpan','PethotelController@simpan');  
	Route::get('pethotel/edit/{id}','PethotelController@edit');  
	Route::put('pethotel/update/{id}','PethotelController@update'); 
	Route::get('pethotel/hapus/{id}', 'PethotelController@hapus');
	Route::get('pethotel/cari','PethotelController@cari');

	Route::get('type','TypeController@index');  	
	Route::get('type/tambah','TypeController@tambah');  
	Route::post('type/simpan','TypeController@simpan');  
	Route::get('type/edit/{id}','TypeController@edit');  
	Route::put('type/update/{id}','TypeController@update'); 
	Route::get('type/hapus/{id}', 'TypeController@hapus');
	Route::get('type/cari','TypeController@cari');

 	Route::get('kandang','KandangController@index');  	
	Route::get('kandang/tambah','KandangController@tambah');  
	Route::post('kandang/simpan','KandangController@simpan');  
	Route::get('kandang/edit/{id}','KandangController@edit');  
	Route::put('kandang/update/{id}','KandangController@update'); 
	Route::get('kandang/hapus/{id}', 'KandangController@hapus');
	Route::get('kandang/cari','KandangController@cari');

	Route::get('member','MemberController@index');
	Route::get('member/hapus/{id}','MemberController@hapus');
	Route::get('member/cari','MemberController@cari');

	Route::get('admin/daftar', 'AdminController@daftar');
	Route::post('admin/simpan', 'AdminController@simpan');
	Route::get('admin/edit/{id}','AdminController@edit');  
	Route::put('admin/update/{id}','AdminController@update'); 
	Route::get('admin/hapus/{id}', 'AdminController@hapus');
	Route::get('admin', 'AdminController@index');
	Route::get('admin/cari', 'AdminController@cari');

	Route::get('booking','BookingController@index');  	
	

});

	//routegambar
	Route::get('/public/gambar/{filename}', function ($filename)
	{
    	$path = storage_path() . '/public/gambar/' . $filename;

    	if(!File::exists($path)) abort(404);

    	$file = File::get($path);
    	$type = File::mimeType($path);

    	$response = Response::make($file, 200);
    	$response->header("Content-Type", $type);
    	
    return $response;
	})->name('foto');

	Route::get('pethotel/tambah','PethotelController@tambah');  
	Route::post('pethotel/simpan','PethotelController@simpan');

	Route::get('pethotel/form-login', 'PethotelController@formLogin');
	Route::post('pethotel/proses-login', 'PethotelController@prosesLogin');
 
Route::prefix('adminph')->middleware('adminph')->group(function(){
    Route::get('dashboard', 'PethotelController@dashboard');
    Route::get('logout', 'Auth\LoginController@logout');

    Route::get('pethotel','PethotelController@indexadminph'); 
    Route::get('pethotel/tambah','PethotelController@tambahadminph');  
    Route::get('pethotel/edit/{id}','PethotelController@editadminph');  
    Route::post('pethotel/simpan','PethotelController@simpanadminph');  
	Route::put('pethotel/update/{id}','PethotelController@updateadminph'); 
	Route::get('pethotel/hapus/{id}', 'PethotelController@hapusadminph');

	Route::get('kandang','PethotelController@indexkandang');  
	Route::get('kandang/tambah','PethotelController@tambahkandang');  
    Route::get('kandang/edit/{id}','PethotelController@editkandang');  
    Route::post('kandang/simpan','PethotelController@simpankandang');  
	Route::put('kandang/update/{id}','PethotelController@updatekandang'); 
	Route::get('kandang/hapus/{id}', 'PethotelController@hapuskandang');

	Route::get('booking','PethotelController@indexbooking');
	Route::get('booking/konfirmasi/{id}','PethotelController@editbooking');
	
	Route::get('booking/editbooking/{id}','PethotelController@editbooking');
	Route::get('booking/hapusbooking/{id}','PethotelController@hapusbooking');
	Route::get('booking/outbooking/{id}','PethotelController@outbooking');  
	Route::get('booking/cari','PethotelController@caribooking');
   
	Route::get('admin', 'PethotelController@indexadmin1');
	

    
});


	Route::get('admin1/form-login', 'AdminController@formLogin');
	Route::post('admin1/proses-login', 'AdminController@prosesLogin');

Route::prefix('admin1')->middleware('admin1')->group(function(){
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('logout', 'Auth\LoginController@logout');

    Route::get('pethotel','AdminController@indexadmin');  	
	Route::get('pethotel/tambah','AdminController@tambahadmin');  
	Route::post('pethotel/simpan','AdminController@simpanadmin');  
	Route::get('pethotel/edit/{id}','AdminController@editadmin');  
	Route::put('pethotel/update/{id}','AdminController@updateadmin'); 
	Route::get('pethotel/hapus/{id}', 'AdminController@hapusadmin');
	Route::get('pethotel/cari','AdminController@cariadmin');

	Route::get('type','AdminController@indextype');  	
	Route::get('type/tambah','AdminController@tambahtype');  
	Route::post('type/simpan','AdminController@simpantype');  
	Route::get('type/edit/{id}','AdminController@edittype');  
	Route::put('type/update/{id}','AdminController@updatetype'); 
	Route::get('type/hapus/{id}', 'AdminController@hapustype');
	Route::get('type/cari','AdminController@caritype');

	Route::get('member','AdminController@indexmember');
	Route::get('member/hapus/{id}','AdminController@hapusmember');
	Route::get('member/cari','AdminController@carimember');

	Route::get('admin', 'AdminController@indexadmin1');

	Route::get('kandang','AdminController@indexkandang'); 

	Route::get('booking','AdminController@indexbooking');


});


	Route::get('/', 'BerandaController@index');

	Route::get('/profil', 'ProfilController@index');



	Route::get('member/daftar', 'MemberController@daftar');
	Route::post('member/simpan', 'MemberController@simpan');
	Route::get('member/form-login', 'MemberController@formLogin');
	Route::post('member/proses-login', 'MemberController@prosesLogin');

	Route::get('/form-login', 'MemberController@bookingLogin');

    Route::get('caripethotel/hasil-cari', 'HasilcariController@index');
    Route::get('caripethotel/detail/{id}', 'HasilcariController@detail');
	Route::post('caripethotel/tambah/{id}', 'MemberController@tambahbooking');
	
	

	Route::prefix('member')->middleware('member')->group(function(){
	    Route::get('dashboard', 'MemberController@dashboard');
	    Route::get('logout', 'Auth\LoginController@logout');
	    Route::get('booking/tambah/{id}','MemberController@tambahbooking');
	    Route::post('booking/simpan','MemberController@simpanbooking');
	    Route::get('booking/member','MemberController@indexbookingmember');
	    Route::get('booking/hasil','MemberController@hasilbooking');
		Route::get('profil/member','MemberController@profilmember');
		Route::get('profil/edit/{id}','MemberController@editmember');  
		Route::put('profil/update/{id}','MemberController@updatemember'); 





	Route::get('caripethotel/detail/{id}', 'HasilcariController@detail');
	Route::post('caripethotel/detail/{id}', 'HasilcariController@simpan');
	Route::post('caripethotel/tambah', 'HasilcariController@tambah');

});



