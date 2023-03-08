@extends('admin.layout')
@section('title', 'Transaksi')
@section('content')

<script type="text/javascript">
    document.getElementById('transaksi').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Transaksi</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="inputNamaBus" class="form-label">Nama Bus</label>
                                    <input type="name" name="nama_bus" class="form-control" id="inputNamaBus">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTujuan" class="form-label">Tujuan</label>
                                    <div class="row px-2">
                                        <div class="col-12 col-md-3">
                                            <label for="inputJabatan" class="form-text">Provinsi</label>
                                            <select name="jabatan" class="form-select" aria-label="Default select1">
                                                <option selected value="1">Sopir</option>
                                                <option value="2">Kenek</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <label for="inputJabatan" class="form-text">Kota</label>
                                            <select name="jabatan" class="form-select" aria-label="Default select1">
                                                <option selected value="1">Sopir</option>
                                                <option value="2">Kenek</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <label for="inputJabatan" class="form-text">Kecamatan</label>
                                            <select name="jabatan" class="form-select" aria-label="Default select2">
                                                <option selected value="1">Sopir</option>
                                                <option value="2">Kenek</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <label for="inputJabatan" class="form-text">Desa</label>
                                            <select name="jabatan" class="form-select" aria-label="Default select3">
                                                <option selected value="1">Sopir</option>
                                                <option value="2">Kenek</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputPenyewa" class="form-label">Penyewa</label>
                                    <input type="number" name="penyewa" class="form-control" id="inputPenyewa">
                                </div>
                                <div class="mb-3">
                                    <label for="inputHarga" class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control" id="inputHarga">
                                </div>
                                <div class="mb-3">
                                    <label for="inputCrew" class="form-label">Crew</label>
                                    <input type="number" name="crew" class="form-control" id="inputCrew">
                                </div>
                                <div class="mb-3">
                                    <label for="inputDp" class="form-label">Dp</label>
                                    <input type="number" name="dp" class="form-control" id="inputDp">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTanggalMulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control" id="inputTanggalMulai">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" class="form-control" id="inputTanggalSelesai">
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