<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
	{
		$data['booking'] = \App\Booking::all();
		$data['judul']  = "Data Booking";
		return view('booking_index',$data);
	}
}
