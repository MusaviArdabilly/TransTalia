@extends('guest.layout')
@section('title', 'Jadwal - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('jadwal').classList.add('fw-bold', 'border-bottom', 'border-primary', 'rounded-bottom');
    document.getElementById('header').classList.add('header-fixed');
</script>

    <div class="mt-5rem">
        <div class="container mt-5rem" id="calendar-container">
            <div id='calendar' class="py-5"></div>
        </div>
    </div>

    <div class="container">
        <div class="col-12 col-md-6 mx-auto pb-0 pb-sm-5">
            <div class="alert alert-primary text-center" role="alert">
                Sudah menentukan jadwal? <br> Masuk dan buat pesananmu sekarang! <br>
                <a href="/masuk">
                    <button type="button" class="btn btn-primary mt-3">Masuk</button>
                </a>
            </div>
        </div>
    </div>
    
    {{-- FullCalendar --}}
    <script src='{{ asset('vendor/fullcalendar/dist/index.global.js') }}'></script>
    <script src='{{ asset('vendor/fullcalendar/package/core/locales/id.global.min.js') }}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                themeSystem: 'bootstrap5',
                contentHeight: '100%',
                contentWidth: '100%',
                initialView: 'dayGridMonth'
          });
          calendar.render();
        });
    </script>

@endsection