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
            <a href="/reservasi/riwayat" class="btn btn-outline-primary my-2">Riwayat Reservasi</a>
        </div>
        <h3 class="text-center fw-bold">Reservasi</h3>
        <div class="accordion py-3" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#calendarCollapse" aria-expanded="true" aria-controls="calendarCollapse">
                        Lihat Jadwal Armada bus
                    </button>
                </h2>
                <div id="calendarCollapse" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 p-3 border rounded">
            <h4 class="text-center my-3">Formulir Reservasi</h4>
            <hr class="my-3">
            <form method="POST" action="/reservasi/check-bus" class="row g-3 my-3">
                @csrf
                <div class="col-md-6">
                    <label for="inputTanggalMulai" class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" id="inputTanggalMulai" value="{{ old('tanggal_mulai', isset($tanggal_mulai) ? $tanggal_mulai : '') }}" @if(request()->is('reservasi/check-bus')) disabled @endif>
                    @if ($errors->has('tanggal_mulai'))
                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('tanggal_mulai') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="inputTanggalSelesai" class="form-label fw-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" id="inputTanggalSelesai" value="{{ old('tanggal_selesai', isset($tanggal_selesai) ? $tanggal_selesai : '') }}" @if(request()->is('reservasi/check-bus')) disabled @endif>
                    @if ($errors->has('tanggal_selesai'))
                        <span class="text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('tanggal_selesai') }}</span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="inputTake" class="form-label m-0 fw-semibold">Rute</label>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="inputTake" class="form-text ps-1">Pilih Kota Penjemputan</label>
                            <input type="text" name="kota_jemput" id="inputTake" class="form-control" placeholder="Nama Kota" value="{{ old('kota_jemput', isset($kota_jemput) ? $kota_jemput : '') }}" @if(request()->is('reservasi/check-bus')) disabled @endif>
                            @if ($errors->has('kota_jemput'))
                                <span class="text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kota_jemput') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputDeliver" class="form-text ps-1">Pilih Kota Tujuan</label>
                            <input type="text" name="kota_tujuan" id="inputDeliver" class="form-control" placeholder="Nama Kota" value="{{ old('kota_tujuan', isset($kota_tujuan) ? $kota_tujuan : '') }}" @if(request()->is('reservasi/check-bus')) disabled @endif>
                            @if ($errors->has('kota_tujuan'))
                                <span class="text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kota_tujuan') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-3 @if(request()->is('reservasi/check-bus')) d-none @endif">
                    <button type="submit" class="btn btn-outline-primary mt-3">Tampilkan bus yang tersedia</button>
                </div>
            </form>
            <div class="d-flex justify-content-end my-3 @if(request()->is('reservasi')) d-none @endif">
                <hr>
                <a href="javascript:history.back()" class="btn btn-outline-primary mt-3">Ganti Jadwal atau Kota</a>
            </div>
            @if(isset($data_bus_tidak_terpakai))
            <form method="POST" action="/reservasi/check-out">
                @csrf
                <input type="hidden" name="tanggal_mulai" value="{{ $tanggal_mulai }}">
                <input type="hidden" name="tanggal_selesai" value="{{ $tanggal_selesai }}">
                <input type="hidden" name="kota_jemput" value="{{ $kota_jemput }}">
                <input type="hidden" name="kota_tujuan" value="{{ $kota_tujuan }}">
                <input type="hidden" name="jarak_rute" value="{{ $jarak_rute }}">
                <input type="hidden" id="selected_armada_bus_id" name="selected_armada_bus_id" value="">
                <div class="col-12">           
                    <label for="inputNamaBus" class="form-label d-block">Pilih Bus</label>
                    @if ($errors->has('selected_armada_bus_id'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('selected_armada_bus_id') }}</span>
                    @endif
                    <div class="row" id="container-selected-bus"></div>
                    <div class="row px-3">
                    <label for="daftarBus" class="form-text">Berikut merupakan bus yang tersedia pada jadwal yang anda cantumkan:</label>
                        @forelse($data_bus_tidak_terpakai as $key => $armada_bus)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card my-3" id="item-bus{{ $armada_bus->id }}">
                                <img src="/assets/images/armada_bus/{{ $armada_bus->gambar }}" class="card-img-top" alt="{{ $armada_bus->gambar }}">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $armada_bus->nama }}</h6>
                                    <p class="form-text">Bus ini memiliki {{ $armada_bus->kursi }} kursi. Bus ini merupakan bus {{ $armada_bus->jenis_bus }}</p>
                                    <button type="button" class="btn btn-outline-primary float-end" id="button-item-bus{{ $armada_bus->id }}" onclick="selectBus({{ $armada_bus->id }}, '{{ $armada_bus->nama }}')">Pilih</button>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-danger text-center mt-3" role="alert">
                            Tidak ada bus yang tersedia pada tanggal yang anda pilih
                        </div>
                        @endforelse
                    </div>
                </div>
                <hr class="my-3">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary float-end">Check Out</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>

{{-- Handle autocomplate kota penjemputan dan kota tujuan  --}}
<script>
    function cities(){
        var options = {
            types: ['(cities)'],
            componentRestrictions: { country: 'id' } 
        };
        
        var pickInput = document.getElementById('inputTake');
        var pickInputAutocomplete = new google.maps.places.Autocomplete(pickInput, options);
        
        var deliverInput = document.getElementById('inputDeliver');
        var deliverInputAutocomplete = new google.maps.places.Autocomplete(deliverInput, options);
    }
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=GOOGLE_AUTOCOMPLETE_API&libraries=places&language=id&callback=cities"></script>

{{-- FullCalendar --}}
<script src='{{ asset('vendor/fullcalendar/dist/index.global.js') }}'></script>
<script src='{{ asset('vendor/fullcalendar/packages/core/locales/id.global.min.js') }}'></script>
<script src='{{ asset('vendor/fullcalendar/packages/bootstrap5/index.global.min.js') }}'></script>
<script>
    var jadwal = @json($events);
    var calendarOptions = {
        timeZone: 'Asia/Jakarta',
        locale: 'id',
        themeSystem: 'bootstrap5',
        initialView: 'multiMonthYear',
        multiMonthMaxColumns: 2,
        headerToolbar: false,
        events: jadwal,
        eventClick: function(info) {
            info.jsEvent.preventDefault(); // Prevent the default click action
            $(info.el).popover({
                content: info.event.title,
                trigger: 'hover',
                placement: 'top',
                container: 'body',
                html: true
            });
            $(info.el).popover('toggle'); // Show the popover
        }
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

    const startDateInput = document.getElementById('inputTanggalMulai');
    const endDateInput = document.getElementById('inputTanggalSelesai');
    startDateInput.addEventListener('change', function() {
        endDateInput.min = startDateInput.value;
        if (endDateInput.value < startDateInput.value) {
            endDateInput.value = startDateInput.value;
        }
    });
</script>

@endsection