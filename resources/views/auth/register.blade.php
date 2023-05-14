@extends('public-layout')
@section('title', 'Daftar - Trans Talia')
@section('content')

<div class="fake-navbar"></div>
<div class="minvh100-130 d-flex align-items-center p-3">
    <div class="container">
        <div class="col-12 col-md-6 mx-auto my-auto">
            <h3 class="text-center fw-bold">DAFTAR</h3>
            <form method="POST" action="/register/post">
                {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="inputNamaDepan" class="form-label">Nama Depan</label>
                    <input name="nama_depan" type="name" class="form-control" id="inputNamaDepan" value="{{ old('nama_depan') }}">
                    @if ($errors->has('nama_depan'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('nama_depan') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputNamaBelakang" class="form-label">Nama Belakang</label>
                    <input name="nama_belakang" type="name" class="form-control" id="inputNamaBelakang" value="{{ old('nama_belakang') }}">
                    @if ($errors->has('nama_belakang'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('nama_belakang') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputNomor" class="form-label">Nomor HP</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                        <input name="no_telp" type="tel" class="form-control" id="inputNomor" value="{{ old('no_telp') }}" aria-describedby="basic-addon1">
                    </div>
                    @if ($errors->has('no_telp'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('no_telp') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" value="{{  old('email') }}">
                    @if ($errors->has('email'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword">
                </div>
                <div class="mb-3">
                    <label for="inputPasswordConfirmation" class="form-label">Konfirmasi Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirmation">
                    @if ($errors->has('password'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-primary mt-2">Daftar</button> <br>
                </div>
            </form>
            <div class="d-flex justify-content-center">
                <div id="emailHelp" class="form-text">Sudah mempunyai akun? <a href="/login">Masuk</a></div>
            </div>
        </div>
    </div>
</div>

@endsection