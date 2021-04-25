<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class ProfilController extends Controller
{
    public function index()
	{
		return view('profil_index');
	}
	
}
