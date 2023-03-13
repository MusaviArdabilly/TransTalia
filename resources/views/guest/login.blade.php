@extends('guest.layout')
@section('title', 'Masuk - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('header').classList.add('header-fixed');
</script>

<div class="minvh100-185 d-flex align-items-center mt-nav p-3">
    <div class="container">
        <div class="col-12 col-md-6 mx-auto my-auto">
            <h3 class="text-center fw-bold">Masuk</h3>
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-primary mt-2">Masuk</button> <br>
                </div>
                <div class="d-flex justify-content-center">
                    <div id="emailHelp" class="form-text">Belum mempunyai akun? <a href="/daftar">Daftar sekarang</a></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection