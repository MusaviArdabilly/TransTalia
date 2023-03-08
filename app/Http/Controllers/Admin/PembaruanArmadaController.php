<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembaruanArmadaController extends Controller
{
    public function index(){
        return view('admin.pembaruanarmada.index');
    }

    public function add(){
        return view('admin.pembaruanarmada.tambah');
    }

    public function store(){
        return view('admin.pembaruanarmada.index');
    }

    public function edit(){
        return view('admin.pembaruanarmada.ubah');
    }

    public function update(){
        return view('admin.pembaruanarmada.index');
    }

    public function destroy(){
        return view('admin.pembaruanarmada.index');
    }
}
