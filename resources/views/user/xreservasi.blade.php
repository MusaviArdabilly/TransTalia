@extends('public-layout')
@section('title', 'Reservasi - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('reservasi').classList.add('border-bottom', 'border-dark', 'rounded-bottom');
</script>

<div class="fake-navbar"></div>
<div class="minvh100-130 d-flex align-items-center p-3">
    <div class="container">
        <div class="d-flex justify-content-end">
            <a href="/riwayat-reservasi" class="btn btn-outline-primary my-2">Riwayat Reservasi</a>
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
            <hr class="mt-3">
            <form method="POST" action="/reservasi/check-out" class="row g-3 mt-2">
                @csrf
                <div class="col-md-6">
                    <label for="inputTanggalMulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" id="inputTanggalMulai">
                    @if ($errors->has('tanggal_mulai'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('tanggal_mulai') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" id="inputTanggalSelesai">
                    @if ($errors->has('tanggal_selesai'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('tanggal_selesai') }}</span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Tujuan</label>
                    <div class="row px-3">
                        <div class="col-md-6">
                            <label for="inputState" class="form-text">Provinsi</label>
                            <select name="provinsi" id="inputState" class="form-select">
                                <option disabled selected>Pilih provinsi</option>
                                <option value="Jawa Timur">Jawa Timur</option>
                            </select>
                            @if ($errors->has('provinsi'))
                                <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('provinsi') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-text">Kota</label>
                            <select name="kota" id="inputState" class="form-select">
                                <option disabled selected>Pilih kota</option>
                                <option value="Malang">Malang</option>
                                <option value="Banyuwangi">Banyuwangi</option>
                            </select>
                            @if ($errors->has('kota'))
                                <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kota') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12">                    
                    {{-- <label for="inputNamaBus" class="form-label">Pilih Bus</label>
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-sync-alt"></i></button>
                        <select class="form-select" id="inputNamaBus" aria-label="Example select with button addon">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> --}}
                    <label for="inputNamaBus" class="form-label d-block">Pilih Bus</label>
                    @if ($errors->has('selected_armada_bus_id'))
                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('selected_armada_bus_id') }}</span>
                    @endif
                    <input type="hidden" id="selected_armada_bus_id" name="selected_armada_bus_id" value="">
                    {{-- selected bus --}}
                    <div class="row px-3" id="container-selected-bus">
                        {{-- show selected bus --}}
                        {{-- <div class="col-2">
                            <div class="input-group mb-3">
                                <input type="text" disabled class="form-control" value="" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">x</button>
                            </div>
                        </div> --}}
                    </div>

                    <div class="row px-3">
                    <label for="daftarBus" class="form-text"> Berikut merupakan bus yang tersedia pada jadwal yang anda pilih:</label>
                        @forelse($data_armada_bus as $key => $armada_bus)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card my-3" id="item-bus{{ $armada_bus->id }}">
                                <img src="/assets/images/armada_bus/{{ $armada_bus->gambar }}" class="card-img-top" alt="{{ $armada_bus->gambar }}">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $armada_bus->nama }}</h6>
                                    <p class="form-text">Bus ini memiliki {{ $armada_bus->kursi }} kursi. Bus ini merupakan bus {{ $armada_bus->jenis_bus }}</p>
                                    <button type="button" class="btn btn-outline-primary float-end" id="button-item-bus{{ $armada_bus->id }}" onclick="selectBus({{ $armada_bus->id }}, '{{ $armada_bus->nama }}')">Pilih</button>
                                    {{-- <button type="button" class="btn btn-primary select-button">Pilih</button> --}}
                                    {{-- <a href="" class="btn btn-primary" onclick="selectIdBus({{ $armada_bus->id }})">Pilih</a> --}}
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <hr class="my-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary float-end">Check Out</button>
                </div>
            </form>
        </div>
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