@extends('admin.layout')
@section('title', 'Pembaruan Armada')
@section('content')

<script type="text/javascript">
    document.getElementById('pembaruanarmada').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-4">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pembaruan Armada</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="inputNamaBus" class="form-label">Nama Bus</label>
                                    <input type="name" name="nama_bus" class="form-control" id="inputNamaBus">
                                </div>
                                <div class="mb-3">
                                    <label for="inputPembaruan" class="form-label">Pembaruan</label>
                                    <input type="number" name="pembaruan" class="form-control" id="inputPembaruan">
                                </div>
                                <div class="mb-3">
                                    <label for="inputDetailPembaruan" class="form-label">Detail Pembaruan</label>
                                    <input type="name" name="detail_pembaruan" class="form-control" id="inputDetailPembaruan">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="inputTanggal">
                                </div>
                                <button type="submit" class="mt-3 btn btn-primary float-end">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection