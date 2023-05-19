@extends('public-layout')
@section('title', 'Jadwal - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('jadwal').classList.add('border-bottom', 'border-dark', 'rounded-bottom');
    document.getElementById('navbar').classList.remove('py-3');
    document.getElementById('navbar').classList.add('bg-light');
</script>

<div class="fake-navbar"></div>
<div class="minvh100-114">
    <div class="container my-5" id="calendar-container">
        <div id="calendar"></div>
    </div>

    <div class="container my-5" id="calendar-container">
        <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23ffffff&ctz=Asia%2FJakarta&showTitle=0&showPrint=0&showTabs=1&showCalendars=0&hl=id&src=YWxleDBtY2NsYW5lQGdtYWlsLmNvbQ&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=MjU2ODYyYzEzOTcxOWZjZWMzYzViY2I0OWE3YTEzYzBhM2IwYmE2ZGQ4ODI2NjI3ZmI2YTg5MWZjZGRhYmVhNEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23039BE5&color=%2333B679&color=%23EF6C00&color=%230B8043" style="border-width:0" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
    </div>

    <div class="container my-5">
        <div class="col-12 col-md-6 mx-auto">
            <div class="alert alert-primary text-center" role="alert">
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