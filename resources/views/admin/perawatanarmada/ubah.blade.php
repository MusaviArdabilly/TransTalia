@extends('admin.layout')
@section('title', 'Perawatan Armada')
@section('content')

<script type="text/javascript">
    document.getElementById('perawatanarmada').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Perawatan Armada</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="inputNamaBus" class="form-label">Nama Bus</label>
                                    <input type="name" name="nama_bus" class="form-control" id="inputNamaBus">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTanggal" class="form-label">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" id="inputTanggal">
                                </div>
                                <div class="mb-3">
                                    <label for="inputKodePerawatan" class="form-label">Kode Perawatan</label>
                                    <input type="name" name="kode_perawatan" class="form-control" id="inputKodePerawatan">
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