@extends('admin.layout')
@section('title', 'Jadwal')
@section('content')

<script type="text/javascript">
    document.getElementById('jadwal').classList.add('active');
    document.getElementById('search-bar').classList.remove('d-sm-inline-block');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search dropshadowlight">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Pencarian"
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-none d-sm-inline-block btn bg-primary disabled text-white shadow-sm">
                {{ \Carbon\Carbon::parse(now())->locale('id')->isoFormat('DD MMM YY') }}
            </div>
        </div> --}}

        <div class="col-12 minvh100-171">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body" id="calendar-container">
                    <div id='calendar'></div>
                </div>
            </div>
            <div class="row col-12 mx-auto mb-3">
                <div class="col-12 col-md-4">
                    <span class="badge text-white mx-auto" style="background-color: #28A745">Hijau</span>
                    <label for="" class="small">Merupakan jadwal yang sudah lunas</label>
                </div>
                <div class="col-12 col-md-4">
                    <span class="badge text-white" style="background-color: #3788d8">Biru</span>
                    <label for="" class="small">Merupakan jadwal yang sudah dilakukan pembayaran</label>
                </div>
                <div class="col-12 col-md-4">
                    <span class="badge text-dark bg-warning">Kuning</span>
                    <label for="" class="small">Merupakan jadwal yang belum dilakukan pembayaran</label>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

    {{-- FullCalendar --}}
    <script src='{{ asset('vendor/fullcalendar/dist/index.global.js') }}'></script>
    <script src='{{ asset('vendor/fullcalendar/package/core/locales/id.global.min.js') }}'></script>
    <script src='{{ asset('vendor/fullcalendar/packages/bootstrap4/index.global.min.js') }}'></script>
    <script src='{{ asset('vendor/fullcalendar/packages/moment/index.global.min.js') }}'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var jadwal = @json($events);
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'Asia/Jakarta',
                locale: 'id',
                themeSystem: 'bootstrap4',
                contentHeight: '100%',
                contentWidth: '100%',
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