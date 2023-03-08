@extends('admin.layout')
@section('title', 'Pegawai')
@section('content')

<script type="text/javascript">
    document.getElementById('pegawai').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search dropshadowlight">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Pencarian"
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-none d-sm-inline-block btn bg-primary text-white shadow-sm">
                {{ str_replace('-', ' ', now()->format('d-M-y')) }}
            </div>
        </div>

        <div class="col-12 minvh100-233">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pegawai</h6>
                    <a href="/admin/pegawai/tambah"><i class="fas fa-plus text-primary"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Depan</th>
                            <th scope="col">Nama Belakang</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No. Hp</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Kabul</td>
                            <td>Andra</td>
                            <td>Sopir</td>
                            <td>Mojolegi</td>
                            <td>082233558473</td>
                            <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Silo</td>
                            <td>Panji</td>
                            <td>Sopir</td>
                            <td>Kalibening</td>
                            <td>082233652343</td>
                            <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Yasin</td>
                            <td>Daffa</td>
                            <td>Kenek</td>
                            <td>Tanggalrejo</td>
                            <td>085663558473</td>
                            <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

    </div>
    <!-- End of Main Content -->

@endsection      