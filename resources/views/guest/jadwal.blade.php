@extends('public-layout')
@section('title', 'Jadwal - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('jadwal').classList.add('border-bottom', 'border-dark', 'rounded-bottom');
    document.getElementById('navbar').classList.remove('py-3');
    document.getElementById('navbar').classList.add('bg-light');
</script>

<div class="fake-navbar"></div>
<div class="minvh100-114 d-flex align-items-center px-0 py-3 p-md-3">
    <div class="container-md">
        <div class="col-12 mb-3">
            <div id="calendar"></div>
        </div>
        <div class="col-12 col-md-6 mx-auto">
            <div class="alert alert-primary text-center p-1 my-0" role="alert">
                Sudah menentukan jadwal? <br> 
                @if(Auth::check())
                Reservasi sekarang! <br>
                <a href="/reservasi" class="btn btn-primary my-2">Reservasi</a>
                @else
                Login dan reservasi sekarang! <br>
                <a href="/login" class="btn btn-primary my-2">Login</a>
                @endif
            </div>
        </div>
    </div>
</div>
    
    {{-- FullCalendar --}}
    <script src='{{ asset('vendor/fullcalendar/dist/index.global.js') }}'></script>
    <script src='{{ asset('vendor/fullcalendar/packages/core/locales/id.global.min.js') }}'></script>
    <script src='{{ asset('vendor/fullcalendar/packages/bootstrap5/index.global.min.js') }}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var jadwal = @json($events);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
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
            });
            calendar.render();
        });
    </script>

@endsection