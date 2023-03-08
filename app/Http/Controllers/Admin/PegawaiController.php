<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(){
        return view('admin.pegawai.index');
    }

    public function add(){
        return view('admin.pegawai.tambah');
    }

    public function store(){
        return view('admin.pegawai.index');
    }

    public function edit(){
        return view('admin.pegawai.ubah');
    }

    public function update(){
        return view('admin.pegawai.index');
    }

    public function destroy(){
        return view('admin.pegawai.index');
    }
}
