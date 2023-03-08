@extends('admin.layout')
@section('title', 'Pegawai')
@section('content')

<script type="text/javascript">
    document.getElementById('pegawai').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Pegawai</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="inputNamaDepan" class="form-label">Nama Depan</label>
                                    <input type="name" name="nama_depan" class="form-control" id="inputNamaDepan">
                                </div>
                                <div class="mb-3">
                                    <label for="inputNamaBelakang" class="form-label">Nama Belakang</label>
                                    <input type="number" name="nama_belakang" class="form-control" id="inputNamaBelakang">
                                </div>
                                <div class="mb-3">
                                    <label for="inputJabatan" class="form-label">Jabatan</label>
                                    <select name="jabatan" class="form-select" aria-label="Default select">
                                        <option selected value="1">Sopir</option>
                                        <option value="2">Kenek</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <div class="row px-2">
                                        <div class="col-4">
                                            <label for="inputJabatan" class="form-text">Kota</label>
                                            <select name="jabatan" class="form-select" aria-label="Default select1">
                                                <option selected value="1">Sopir</option>
                                                <option value="2">Kenek</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="inputJabatan" class="form-text">Kecamatan</label>
                                            <select name="jabatan" class="form-select" aria-label="Default select2">
                                                <option selected value="1">Sopir</option>
                                                <option value="2">Kenek</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="inputJabatan" class="form-text">Desa</label>
                                            <select name="jabatan" class="form-select" aria-label="Default select3">
                                                <option selected value="1">Sopir</option>
                                                <option value="2">Kenek</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputNoHp" class="form-label">No. Hp</label>
                                    <input type="number" name="no_hp" class="form-control" id="inputNoHp">
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