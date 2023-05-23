@extends('public-layout')
@section('title', 'Login - Trans Talia')
@section('content')

<div class="fake-navbar"></div>
<div class="minvh100-114 d-flex align-items-center p-3">
    <div class="container">
        <div class="col-12 col-md-6 mx-auto my-auto">
            <h3 class="text-center fw-bold">LOGIN</h3>
            <form method="POST" action="/login/post">
                {!! csrf_field() !!}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="inputPassword" value="{{ old('password') }}">
                        <button class="btn btn-outline-secondary" type="button" onclick="showLoginPassword()"><i class="far fa-eye-slash" id="iconPassword"></i></button>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-primary mt-2">Masuk</button> <br>
                </div>
            </form>
            @if (session('fail'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('fail') }}
                </div>
            @endif
            <div class="d-flex justify-content-center">
                <div id="emailHelp" class="form-text">Belum mempunyai akun? <a href="/register">Daftar sekarang</a></div>
            </div>
        </div>
    </div>
</div>

@endsection