@extends('admin.layout')
@section('title', 'Pembaruan Armada')
@section('content')

<script type="text/javascript">
    document.getElementById('pembaruanarmada').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Pembaruan Armada</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/pembaruan-armada/ubah/'.$pembaruan_armada->id.'/post') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputArmadaBus">Armada Bus</label>
                                    <select name="armada_bus_id" class="form-control select2" aria-label="Default select" id="inputArmadaBus">
                                        @foreach ($data_armada_bus as $armada_bus)
                                            <option value="{{ $armada_bus->id }}" {{ $armada_bus->id == $pembaruan_armada->armada_bus_id ? 'selected' : '' }}>{{ $armada_bus->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('armada_bus_id'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('armada_bus_id') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputPembaruan" class="form-label">Pembaruan</label>
                                    <input type="text" name="pembaruan" value="{{ $pembaruan_armada->pembaruan }}" class="form-control" id="inputPembaruan">            
                                    @if ($errors->has('pembaruan'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('pembaruan') }}</span>
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