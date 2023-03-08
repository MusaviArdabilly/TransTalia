<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerformaPegawaiController extends Controller
{
    public function index(){
        return view('admin.performapegawai.index');
    }

    public function add(){
        return view('admin.performapegawai.tambah');
    }

    public function store(){
        return view('admin.performapegawai.index');
    }

    public function edit(){
        return view('admin.performapegawai.ubah');
    }

    public function update(){
        return view('admin.performapegawai.index');
    }

    public function destroy(){
        return view('admin.performapegawai.index');
    }
}
