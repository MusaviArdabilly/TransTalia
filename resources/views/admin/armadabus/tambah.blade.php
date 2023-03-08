@extends('admin.layout')
@section('title', 'Armada Bus')
@section('content')

<script type="text/javascript">
    document.getElementById('armadabus').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Armada Bus</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="inputNamaBus" class="form-label">Nama Bus</label>
                                    <input type="name" name="nama_bus" class="form-control" id="inputNamaBus">
                                </div>
                                <div class="mb-3">
                                    <label for="inputJumlahKursi" class="form-label">Jumlah Kursi</label>
                                    <input type="number" name="jumlah_kursi" class="form-control" id="inputJumlahKursi">
                                </div>
                                <div class="mb-3">
                                    <label for="inputSasis" class="form-label">Sasis</label>
                                    <input type="name" name="sasis" class="form-control" id="inputSasis">
                                </div>
                                <div class="mb-3">
                                    <label for="inputMesin" class="form-label">Mesin</label>
                                    <input type="name" name="mesin" class="form-control" id="inputMesin">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleColorInput" class="form-label">Warna</label>
                                    <input type="color" name="warna" class="form-control form-control-color w-25" id="exampleColorInput" value="#563d7c" title="Pilih Warna">
                                </div>
                                <div class="mb-3">
                                    <label for="inputPlatNomor" class="form-label">Plat Nomor</label>
                                    <input type="name" name="plat_nomor" class="form-control" id="inputPlatNomor">
                                </div>
                                <div class="mb-3">
                                    <label for="inputGps" class="form-label">Link Gps</label>
                                    <input type="name" name="link_gps" class="form-control" id="inputGps">
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