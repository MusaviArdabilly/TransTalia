@extends('admin.layout')
@section('title', 'Performa Pegawai')
@section('content')

<script type="text/javascript">
    document.getElementById('performapegawai').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Performa Pegawai</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="inputNamaPegawai" class="form-label">Nama Pegawai</label>
                                    <input type="name" name="nama_pegawai" class="form-control" id="inputNamaPegawai">
                                </div>
                                <div class="mb-3">
                                    <label for="inputJumlahOrder" class="form-label">Jumlah Order</label>
                                    <input type="number" name="jumlah_order" class="form-control" id="inputJumlahOrder">
                                </div>
                                <button type="submit" class="mt-3 btn btn-primary float-end">Simpan</button>
                                <button type="submit" class="mt-3 btn btn-danger float-end me-3">Batal</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection