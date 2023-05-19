<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;

class ReservasiController extends Controller
{
    public function index(){
        $data_reservasi = Reservasi::all();

        return view('admin.reservasi.index', compact('data_reservasi'));
    }
}
