<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        return view('admin.transaksi.index');
    }

    public function add(){
        return view('admin.transaksi.tambah');
    }

    public function store(){
        return view('admin.transaksi.index');
    }

    public function edit(){
        return view('admin.transaksi.ubah');
    }

    public function update(){
        return view('admin.transaksi.index');
    }

    public function destroy(){
        return view('admin.transaksi.index');
    }
}
