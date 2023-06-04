@extends('public-layout')
@section('title', 'Check Out - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('reservasi').classList.add('border-bottom', 'border-dark', 'rounded-bottom');
    document.getElementById('navbar').classList.remove('py-3');
    document.getElementById('navbar').classList.add('bg-light');
</script>

<div class="fake-navbar"></div>
<div class="minvh100-114 d-flex align-items-center p-3">
    <div class="container">
        <div class="mb-3 p-3 border rounded">
            <h4 class="text-center mb-3">Check Out Reservasi</h4>
            <hr class="mt-3">
            <div id="spinner-container" class="d-none">
                <div id="spinner-overlay"></div>
                <div id="spinner" class="spinner-border text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <form method="POST" action="/reservasi/check-out/post" class="row g-3 mt-2" id="form-checkOut">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="kodeReservasi" class="form-label">Kode Reservasi</label>
                            <input readonly type="text" name="kode_reservasi" class="form-control" id="kodeReservasi" value="{{ $kode_reservasi }}">
                        </div>
                        <div class="col-6 d-flex d-md-none"></div>
                        <div class="col-6 col-md-3">
                            <label for="inputTanggalMulai" class="form-label">Tanggal Mulai</label>
                            <input readonly type="text" class="form-control" value="{{ \Carbon\Carbon::parse($tanggal_mulai)->locale('id')->isoFormat('DD MMMM YYYY') }}">
                            <input type="hidden" name="tanggal_mulai" value="{{ $tanggal_mulai }}">
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai</label>
                            <input readonly type="text" name="tanggal_selesai" class="form-control" value="{{ \Carbon\Carbon::parse($tanggal_selesai)->locale('id')->isoFormat('DD MMMM YYYY') }}">
                            <input type="hidden" name="tanggal_selesai" value="{{ $tanggal_selesai }}">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Tujuan</label>
                    <div class="row px-3">
                        <div class="col-md-6">
                            <label for="inputState" class="form-text">Kota Penjemputan</label>
                            <input readonly type="text" name="kota_jemput" class="form-control" value="{{ str_replace(', Indonesia', '', $kota_jemput) }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-text">Kota Tujuan</label>
                            <input readonly type="text" name="kota_tujuan" class="form-control" value="{{ str_replace(', Indonesia', '', $kota_tujuan) }}">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="selectedBus" class="form-label d-block">Bus yang dipilih:</label>
                    <div class="row">
                        @forelse($data_selected_armada_bus as $key => $selected_armada_bus)
                        <div class="col-6 col-md-3" id="selectedBus">
                            <div class="card">
                                <div class="card-body">
                                    <input type="hidden" name="sub_total[]" value="{{ $sub_totals[$key] }}">
                                    <input type="hidden" name="selected_armada_bus_id[]" value="{{ $selected_armada_bus->id }}">
                                    <h6 class="card-title">{{ $selected_armada_bus->nama }}</h6>
                                    <p class="form-text my-1">Jumlah Kursi: {{ $selected_armada_bus->kursi }}</p>
                                    <p class="form-text my-1">Jenis Bus: {{ $selected_armada_bus->jenis_bus }}</p>
                                    <p class="d-inline form-text my-1">Sub Total:</p> <p class="d-inline form-text my-1 fw-bold">Rp. {{ number_format($sub_totals[$key], 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                        data kosong
                        @endforelse
                    </div>
                </div>
                <div class="col-6 d-none d-md-flex"></div>
                <div class="col-6 col-md-1">
                    <label for="harga" class="form-label">Durasi:</label>
                    <input type="text" readonly class="form-control text-end" id="harga" value="{{$durasi}} Hari">
                </div>
                <div class="col-6 col-md-2">
                    <label for="harga" class="form-label">Jarak:</label>
                    <input type="text" readonly class="form-control text-end" id="harga" value="{{$jarak_rute}} KM">
                </div>
                <div class="col-12 col-md-3">
                    <label for="harga" class="form-label">Total Harga:</label>
                    <input type="hidden" name="total_harga" value="{{ $total_harga }}">
                    <input type="text" readonly class="form-control text-end" id="harga" value="Rp. {{ number_format($total_harga, 0, ',', '.') }}">
                </div>
                <hr class="mb-0">
                <div class="d-flex justify-content-end">
                    <a href="javascript:history.back()" class="btn btn-outline-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Proses</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#form-checkOut').on('submit', function () {
        $('#spinner-container').removeClass('d-none'); // Show the spinner
    });
    // After the email is sent successfully
    $('#spinner-container').addClass('d-none'); // Hide the spinner
</script>

@endsection