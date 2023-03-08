<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KodePerawatanController extends Controller
{
    public function index(){
        return view('admin.kodeperawatan.index');
    }

    public function add(){
        return view('admin.kodeperawatan.tambah');
    }

    public function store(){
        return view('admin.kodeperawatan.index');
    }

    public function edit(){
        return view('admin.kodeperawatan.ubah');
    }

    public function update(){
        return view('admin.kodeperawatan.index');
    }

    public function destroy(){
        return view('admin.kodeperawatan.index');
    }
}
