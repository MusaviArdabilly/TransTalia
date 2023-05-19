@extends('public-layout')
@section('title', 'Edit Profile - Trans Talia')
@section('content')

<div class="fake-navbar"></div>
<div class="minvh100-114 d-flex align-items-center p-3">
    <div class="container">
        <div class="col-12 col-md-6 mx-auto my-auto">
            <h3 class="text-center fw-bold">Edit Password</h3>
            <form method="POST" action="/edit-password/post">
                @csrf
                <div class="mb-3">
                    <label for="inputOldPassword" class="form-label">Password Sekarang</label>
                    <div class="input-group">
                        <input type="password" name="old_password" class="form-control" id="inputOldPassword">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="showOldPassword()"><i class="far fa-eye-slash" id="iconOldPassword"></i></button>
                    </div>
                    @if ($errors->has('old_password'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('old_password') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputNewPassword" class="form-label">Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="new_password" class="form-control" id="inputNewPassword">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="showNewPassword()"><i class="far fa-eye-slash" id="iconNewPassword"></i></button>
                    </div>
                    @if ($errors->has('new_password'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('new_password') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputNewPasswordConfirmation" class="form-label">Konfirmasi Password Baru</label>
                    <div class="input-group">
                        <input type="password" name="new_password_confirmation" class="form-control" id="inputNewPasswordConfirmation">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="showNewPasswordConfirmation()"><i class="far fa-eye-slash" id="iconNewPasswordConfirmation"></i></button>
                    </div>
                    @if ($errors->has('new_password'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('new_password') }}</span>
                    @endif
                </div>
                @if (session('fail'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{ session('fail') }}
                    </div>
                @endif
                <div class="d-flex justify-content-end my-3">
                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary mt-2 me-4">Batal</a>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection