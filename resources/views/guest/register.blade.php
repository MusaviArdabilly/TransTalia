@extends('guest.layout')
@section('title', 'Daftar - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('header').classList.add('header-fixed');
</script>

<div class="minvh100-185 d-flex align-items-center mt-nav p-3">
    <div class="container">
        <div class="col-12 col-md-6 mx-auto my-auto">
            <h3 class="text-center fw-bold">Daftar</h3>
            <form>
                <div class="mb-3">
                    <label for="inputNamaDepan" class="form-label">Nama Depan</label>
                    <input type="name" class="form-control" id="inputNamaDepan">
                </div>
                <div class="mb-3">
                    <label for="inputNamaBelakang" class="form-label">Nama Belakang</label>
                    <input type="name" class="form-control" id="inputNamaBelakang">
                </div>
                <div class="mb-3">
                    <label for="inputNomor" class="form-label">Nomor HP</label>
                    <input type="tel" class="form-control" id="inputNomor">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword">
                </div>
                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-primary mt-2">Daftar</button> <br>
                </div>
                <div class="d-flex justify-content-center">
                    <div id="emailHelp" class="form-text">Sudah mempunyai akun? <a href="/masuk">Masuk</a></div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection