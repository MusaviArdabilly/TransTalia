<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function reservation(){
        return view ('user.reservasi');
    }
    public function reservationHistory(){
        return view ('user.riwayatreservasi');
    }
}
