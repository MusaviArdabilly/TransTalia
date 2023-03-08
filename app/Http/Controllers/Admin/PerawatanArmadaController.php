<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerawatanArmadaController extends Controller
{
    public function index(){
        return view('admin.perawatanarmada.index');
    }

    public function add(){
        return view('admin.perawatanarmada.tambah');
    }

    public function store(){
        return view('admin.perawatanarmada.index');
    }

    public function edit(){
        return view('admin.perawatanarmada.ubah');
    }

    public function update(){
        return view('admin.perawatanarmada.index');
    }

    public function destroy(){
        return view('admin.perawatanarmada.index');
    }
}
