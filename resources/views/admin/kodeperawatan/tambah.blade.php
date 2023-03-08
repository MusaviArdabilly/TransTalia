@extends('admin.layout')
@section('title', 'Kode Perawatan')
@section('content')

<script type="text/javascript">
    document.getElementById('kodeperawatan').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kode Perawatan</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="inputKode" class="form-label">Kode</label>
                                    <input type="name" name="kode" class="form-control" id="inputKode">
                                </div>
                                <div class="mb-3">
                                    <label for="inputKeterangan" class="form-label">Keterangan</label>
                                    <input type="number" name="keterangan" class="form-control" id="inputKeterangan">
                                </div>
                                <div class="mb-3">
                                    <label for="inputKategoriBarang" class="form-label">Kategori Barang</label>
                                    {{-- <input type="name" name="kategori_barang" class="form-control" id="inputKategoriBarang"> --}}
                                    <select name="kategori_barang" class="form-select" aria-label="Default select">
                                        <option selected value="1">Konsumtif</option>
                                        <option value="2">Non-konsumtif</option>
                                    </select>
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