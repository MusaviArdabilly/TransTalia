@extends('guest.layout')
@section('title', 'Jadwal')
@section('content')

<script type="text/javascript">
    document.getElementById('jadwal').classList.add('fw-bold', 'border-bottom', 'border-primary', 'rounded-bottom');
</script>

    <div class="minvh100-157">
        Hello World jadwal
        <div class="container">
            <div id='calendar'></div>
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
            aspectRatio: 3,
            initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>

@endsection