@extends('admin.layout')
@section('title', 'Perawatan Armada')
@section('content')

<script type="text/javascript">
    document.getElementById('perawatanarmada').classList.add('active');
    document.getElementById('search-bar').classList.remove('d-sm-inline-block');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-4">

        <div class="col-12 minvh100-219">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Perawatan Armada</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form method="POST" action="/admin/perawatan-armada/tambah/post">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputArmadaBus">Cari Armada Bus</label>
                                    <select name="armada_bus_id" class="form-control select2" aria-label="Default select" id="inputArmadaBus">
                                        @foreach ($data_armada_bus as $armada_bus)
                                            <option value="{{ $armada_bus->id }}">{{ $armada_bus->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('armada_bus_id'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('armada_bus_id') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputKodePerawatan">Cari Kode Perawatan</label>
                                    <select name="kode_perawatan_id" class="form-control select2" aria-label="Default select" id="inputKodePerawatan">
                                        @foreach ($data_kode_perawatan as $kode_perawatan)
                                            <option value="{{ $kode_perawatan->id }}">{{ $kode_perawatan->kode }} - {{ $kode_perawatan->keterangan }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kode_perawatan_id'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kode_perawatan_id') }}</span>
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