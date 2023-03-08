<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArmadaBusController extends Controller
{
    public function index(){
        return view('admin.armadabus.index');
    }

    public function add(){
        return view('admin.armadabus.tambah');
    }

    public function store(){
        return view('admin.armadabus.index');
    }

    public function edit(){
        return view('admin.armadabus.ubah');
    }

    public function update(){
        return view('admin.armadabus.index');
    }

    public function destroy(){
        return view('admin.armadabus.index');
    }
}
