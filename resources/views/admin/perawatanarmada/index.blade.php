@extends('admin.layout')
@section('title', 'Perawatan Armada')
@section('content')

<script type="text/javascript">
    document.getElementById('perawatanarmada').classList.add('active');
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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Perawatan Armada</h6>
                    <a href="/admin/perawatan_armada/tambah"><i class="fas fa-plus text-primary"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Bus</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Kode Perawatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>ORION</td>
                                    <td>12 Februari 2023</td>
                                    <td>M01</td>
                                    <td><i class="fas fa-edit text-warning"></i> &nbsp; <i class="fas fa-trash-alt text-danger"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Penjelasan Kode Perawatan</h6>
                    <a href="/admin/perawatan_armada/tambah"><i class="fas fa-plus text-primary"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Kategori Barang</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>M01</td>
                                    <td>Ban</td>
                                    <td>M01</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>M02</td>
                                    <td>Kanvas Rem</td>
                                    <td>M01</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>D01</td>
                                    <td>Oli Mesin</td>
                                    <td>M01</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>D02</td>
                                    <td>Oli Gardan</td>
                                    <td>M01</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>D03</td>
                                    <td>Air Radiator</td>
                                    <td>M01</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>K01</td>
                                    <td>Dinamo Wiper</td>
                                    <td>M01</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
    <!-- End of Main Content -->

@endsection      