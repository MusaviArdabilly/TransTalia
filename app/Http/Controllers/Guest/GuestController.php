<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
        return view('guest.index');
    }
    public function profil(){
        return view('guest.profil');
    }
    public function jadwal(){
        return view('guest.jadwal');
    }
    public function logo(){
        return view('logo');
    }
}
