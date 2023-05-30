@extends('public-layout')
@section('title', 'Reservasi - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('reservasi').classList.add('border-bottom', 'border-dark', 'rounded-bottom');
    document.getElementById('navbar').classList.remove('py-3');
    document.getElementById('navbar').classList.add('bg-light');
</script>

<div class="fake-navbar"></div>
<div class="minvh100-114 d-flex align-items-center p-3">
    <div class="container">
        <div class="d-flex justify-content-end my-3">
            <a href="/reservasi" class="btn btn-outline-secondary my-2">Kembali</a>
        </div>
        <h4 class="text-center mb-3 fw-bold">Riwayat Reservasi</h4>
        <div class="p-3">
            @forelse($data_reservasi as $key => $reservasi)
            <div class="mb-3 p-3 border rounded shadow-sm">
                <div class="col-12">
                    <label for="">{{ $reservasi->created_at }}</label>
                    <label for="">| {{ $reservasi->kode }}</label>
                    <label for="">| {{ $reservasi->status }}</label>
                    <hr>
                    {{-- <label for="">{{ $reservasi->reservasi_armada_bus }}</label> --}}
                    <label for="">{{ $reservasi->kota_jemput }}</label>
                    <label for="">| {{ $reservasi->kota_tujuan }}</label> <br>
                    @foreach($reservasi->reservasi_armada_bus as $armada)
                    <label for="">{{ $armada->armada_bus->nama }} - {{ $armada->sub_total }} | </label>
                    @endforeach <br>
                    <label for="">{{ $reservasi->total_harga }}</label>
                    <label for="">{{ $reservasi->dibayar }}</label>
                </div>
            </div>
            @empty
            @endforelse
            <div class="d-flex justify-content-end pt-3">
                {{ $data_reservasi->links() }}
            </div>
        </div>


            {{-- <h4 class="text-center mb-3">Check Out Reservasi</h4>
            <hr class="mt-3">
            <form method="POST" action="/reservasi/check-out/post" class="row g-3 mt-2">
                @csrf
                <div class="col-12">
                    <div class="row">

                        <div class="col-6 col-md-6">
                            <label for="kodeReservasi" class="form-label">Kode Reservasi</label>
                            <input readonly type="text" name="kode_reservasi" class="form-control" id="kodeReservasi" value="{{ $kode_reservasi }}">
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="inputTanggalMulai" class="form-label">Tanggal Mulai</label>
                            <input readonly type="text" name="tanggal_mulai" class="form-control" value="{{ $tanggal_mulai }}">
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai</label>
                            <input readonly type="text" name="tanggal_selesai" class="form-control" value="{{ $tanggal_selesai }}">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Tujuan</label>
                    <div class="row px-3">
                        <div class="col-md-6">
                            <label for="inputState" class="form-text">Kota Penjemputan</label>
                            <input readonly type="text" name="kota_jemput" class="form-control" value="{{ $kota_jemput }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-text">Kota Tujuan</label>
                            <input readonly type="text" name="kota_tujuan" class="form-control" value="{{ $kota_tujuan }}">
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="selectedBus" class="form-label d-block">Bus yang dipilih:</label>
                    <div class="row">
                        @forelse($data_selected_armada_bus as $key => $selected_armada_bus)
                        <div class="col-3" id="selectedBus">
                            <div class="card">
                                <div class="card-body">
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
                <div class="col-md-3">
                    <label for="harga" class="form-label">Total Harga:</label>
                    <input type="hidden" name="total_harga" value="{{ $total_harga }}">
                    <input type="text" readonly class="form-control text-end" id="harga" value="Rp. {{ number_format($total_harga, 0, ',', '.') }}">
                </div>
                <div class="col-md-3">
                    <label for="harga" class="form-label">Jarak:</label>
                    <input type="text" readonly class="form-control text-end" id="harga" value="Rp. {{$jarak_rute}}">
                </div>
                <hr class="mb-0">
                <div class="d-flex justify-content-end">
                    <a href="javascript:history.back()" class="btn btn-outline-secondary me-4">Kembali</a>
                    <button type="submit" class="btn btn-primary">Proses</button>
                </div>
            </form> --}}
    </div>
</div>
    
{{-- FullCalendar --}}
<script src='{{ asset('vendor/fullcalendar/dist/index.global.js') }}'></script>
<script src='{{ asset('vendor/fullcalendar/package/core/locales/id.global.min.js') }}'></script>
<script>
    var calendarOptions = {
                locale: 'id',
                themeSystem: 'bootstrap5',
                contentHeight: '100%',
                initialView: 'dayGridMonth'
    };
    var accordionToggle = document.querySelector('.accordion-button');
    accordionToggle.addEventListener('click', function() {
        var calendarEl = document.querySelector('#calendar');
        if (calendarEl.classList.contains('fc')) {
            // FullCalendar has been initialized, so remove it now
            calendar.destroy();
        } else {
            // FullCalendar hasn't been initialized yet, so do it now
            var calendar = new FullCalendar.Calendar(calendarEl, calendarOptions);
            calendar.render();
        }
    });
</script>

@endsection