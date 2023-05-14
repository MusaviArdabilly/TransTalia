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
            <h4 class="text-center my-3">Formulir Pemesanan</h4>
            <hr class="mt-3">
            <form class="row g-3 mt-2">
                <div class="col-md-6">
                    <label for="inputTanggalMulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" id="inputTanggalMulai">
                </div>
                <div class="col-md-6">
                    <label for="inputTanggalSelesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" id="inputTanggalSelesai">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Tujuan</label>
                    <div class="row px-3">
                        <div class="col-md-6">
                            <label for="inputState" class="form-text">Provinsi</label>
                            <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-text">Kota</label>
                            <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">                    
                    <label for="inputNamaBus" class="form-label">Pilih Bus</label>
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button"><i class="fas fa-sync-alt"></i></button>
                        <select class="form-select" id="inputNamaBus" aria-label="Example select with button addon">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
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