@extends('admin.layout')
@section('title', 'Kode Perawatan')
@section('content')

<script type="text/javascript">
    document.getElementById('kodeperawatan').classList.add('active');
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
                    <h6 class="m-0 font-weight-bold text-primary">Kode Perawatan</h6>
                    <a href="/admin/kode_perawatan/tambah">
                        <i class="fas fa-plus text-primary"></i>
                    </a>
                </div>
                <!-- Card Body -->
                <div class="card-body table-responsive">
                    <table class="table" id="datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Kategori Barang</th>
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>01</td>
                            <td>Ban</td>
                            <td>Konsumtif</td>
                            <td class="text-center"><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection      