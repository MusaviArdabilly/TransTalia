@extends('admin.layout')
@section('title', 'Armada Bus')
@section('content')

<script type="text/javascript">
    document.getElementById('armadabus').classList.add('active');
    document.getElementById('search-bar').classList.remove('d-sm-inline-block');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-171">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Armada Bus</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form method="POST" action="/admin/armada-bus/tambah/post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputNamaBus" class="form-label">Nama Bus</label>
                                    <input type="text" name="nama" class="form-control" id="inputNamaBus" value="{{ old('nama') }}">
                                    @if ($errors->has('nama'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputGambarBus" class="form-label">Gambar Bus</label>
                                    <div class="custom-file">
                                        <input type="file" name="gambar">
                                    </div>
                                    @if ($errors->has('gambar'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('gambar') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputJumlahKursi" class="form-label">Jumlah Kursi</label>
                                    <input type="number" name="kursi" class="form-control" id="inputJumlahKursi" value="{{ old('kursi') }}">
                                    @if ($errors->has('kursi'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kursi') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputSasis" class="form-label">Sasis</label>
                                    <input type="text" name="sassis" class="form-control" id="inputSasis" value="{{ old('sassis') }}">
                                    @if ($errors->has('sassis'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('sassis') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputMesin" class="form-label">Jenis Bus</label>
                                    <input type="text" name="jenis_bus" class="form-control" id="inputMesin" value="{{ old('jenis_bus') }}">
                                    @if ($errors->has('jenis_bus'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('jenis_bus') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputHargaSewa" class="form-label">Harga Sewa per Kilometer</label>
                                    <input type="text" name="harga_sewa" class="form-control" id="inputHargaSewa" value="{{ old('harga_sewa') }}">
                                    @if ($errors->has('harga_sewa'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('harga_sewa') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputPlatNomor" class="form-label">Plat Nomor</label>
                                    <input type="text" name="plat_nomor" class="form-control" id="inputPlatNomor" value="{{ old('plat_nomor') }}">
                                    @if ($errors->has('plat_nomor'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('plat_nomor') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputGps" class="form-label">Link Gps</label>
                                    <input type="text" name="gps" class="form-control" id="inputGps" value="{{ old('gps') }}">
                                    @if ($errors->has('gps'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('gps') }}</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary mr-2">Batal</a>
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