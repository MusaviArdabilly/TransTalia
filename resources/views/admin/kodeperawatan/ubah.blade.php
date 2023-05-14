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
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Kode Perawatan</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form method="POST" action="{{ url('/admin/kode-perawatan/ubah/'.$kode_perawatan->id.'/post') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputKode" class="form-label">Kode</label>
                                    <input type="text" name="kode" class="form-control" id="inputKode" value="{{ $kode_perawatan->kode }}">
                                </div>
                                <div class="mb-3">
                                    <label for="inputKeterangan" class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" id="inputKeterangan" value="{{ $kode_perawatan->keterangan }}">
                                </div>
                                <div class="form-group">
                                    <label for="formSelectKategoriBarang">Kategori Barang</label>
                                    <select name="kategori" class="form-control" id="formSelectKategoriBarang">
                                        <option value="Barang Habis Pakai" {{ old('kategori') === 'Barang Habis Pakai' ? 'selected' : '' }}>Barang Habis Pakai</option>
                                        <option value="Barang Tidak Habis Pakai" {{ old('kategori') === 'Barang Tidak Habis Pakai' ? 'selected' : '' }}>Barang Tidak Habis Pakai</option>
                                    </select>
                                    @if ($errors->has('kategori'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kategori') }}</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary mr-4">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection