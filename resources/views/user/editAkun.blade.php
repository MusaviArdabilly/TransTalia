@extends('public-layout')
@section('title', 'Edit Profile - Trans Talia')
@section('content')

<div class="fake-navbar"></div>
<div class="minvh100-130 d-flex align-items-center p-3">
    <div class="container">
        <div class="col-12 col-md-6 mx-auto my-auto">
            <h3 class="text-center fw-bold">Edit Akun</h3>
            <form method="POST" action="/edit-akun/post">
                {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="inputNamaDepan" class="form-label">Nama Depan</label>
                    <input name="nama_depan" type="name" class="form-control" id="inputNamaDepan" value="{{ Auth::User()->nama_depan }}">
                    @if ($errors->has('nama_depan'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('nama_depan') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputNamaBelakang" class="form-label">Nama Belakang</label>
                    <input name="nama_belakang" type="name" class="form-control" id="inputNamaBelakang" value="{{ Auth::User()->nama_belakang }}">
                    @if ($errors->has('nama_belakang'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('nama_belakang') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputNomor" class="form-label">Nomor HP</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">+62</span>
                        <input name="no_telp" type="tel" class="form-control" id="inputNomor" value="{{ Auth::User()->no_telp }}" aria-describedby="basic-addon1">
                    </div>
                    @if ($errors->has('no_telp'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('no_telp') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" value="{{ Auth::User()->email }}">
                    @if ($errors->has('email'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('email') }}</span>
                    @endif
                </div>
                {{-- <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <div class="input-group">
                        <input name="email" type="email" class="form-control" id="inputEmail" value="{{ Auth::User()->email }}" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Verifikasi</button>
                    </div>
                    @if ($errors->has('email'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('email') }}</span>
                    @endif
                </div> --}}
                <div class="d-flex justify-content-end my-3">
                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary mt-2 me-4">Batal</a>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </div>
                <hr>
            </form>
            <div class="d-flex justify-content-center my-3">
                <a href="/edit-password" class="btn btn-outline-primary mt-2">Edit Password</a>
            </div>
        </div>
    </div>
</div>

@endsection