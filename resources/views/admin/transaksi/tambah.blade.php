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
                            <form method="POST" action="/admin/transaksi/tambah/post">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputReservasi">Cari Reservasi</label>
                                    <select name="reservasi_id" class="form-control select2" aria-label="Default select" id="inputReservasi">
                                        @forelse ($data_reservasi as $reservasi)
                                            <option value="{{ $reservasi->id }}">{{ $reservasi->kode }} - {{ $reservasi->user->nama_depan }} {{ $reservasi->user->nama_belakang }} - {{ $reservasi->total_harga }} -> {{ $reservasi->dibayar }}</option>
                                        @empty
                                            <option>Tidak ada data reservasi yang perlu dibayar</option>
                                        @endforelse
                                    </select>
                                    @if ($errors->has('user_id'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('user_id') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputNominal" class="form-label">Nominal</label>
                                    <input type="number" name="nominal" class="form-control" id="inputNominal">
                                </div>
                                <div class="mb-3">
                                    <label for="inputKeterangan">Keterangan</label> 
                                    <select name="keterangan" class="form-control select2" aria-label="Default select" id="inputKeterangan">
                                        <option value="uang_muka">Uang Muka</option>
                                        <option value="cicilan">Cicilan</option>
                                        <option value="pelunasan">Pelunasan</option>
                                    </select>
                                    @if ($errors->has('keterangan'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('keterangan') }}</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary mr-4">Batal</a>
                                    <button type="submit" class="btn btn-primary"{{ $data_reservasi->isEmpty() ? 'disabled' : '' }}>Simpan</button>
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