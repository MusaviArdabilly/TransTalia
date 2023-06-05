@extends('admin.layout')
@section('title', 'Perawatan Armada')
@section('content')

<script type="text/javascript">
    document.getElementById('perawatanarmada').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form action="/admin/perawatan-armada"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search dropshadowlight">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ $search_key }}" class="form-control bg-light border-0 small" placeholder="Pencarian"
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
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
            <div id="accordion" class="mb-4 shadow">
                <div class="card">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between" id="headingOne">
                        <button class="btn btn-outline-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Kalender
                        </button>
                    </div>
                
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                        <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Perawatan Armada</h6>
                    <a href="/admin/perawatan-armada/tambah"><i class="fas fa-plus text-primary"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@sortablelink('armada_bus.nama', 'Nama Bus', [], ['class' => 'text-decoration-none text-secondary'])</th>
                                    <th scope="col">@sortablelink('kode_perawatan.kode', 'Perawatan', [], ['class' => 'text-decoration-none text-secondary'])</th>
                                    <th scope="col">@sortablelink('acreated_at', 'Waktu', [], ['class' => 'text-decoration-none text-secondary'])</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($data_perawatan_armada as $key => $perawatan_armada)
                                    <tr>
                                        <th scope="row">{{ $data_perawatan_armada->firstItem()+$key }}</th>
                                        <td>{{ $perawatan_armada->armada_bus->nama }}</td>
                                        <td>{{ $perawatan_armada->kode_perawatan->kode }} - {{ $perawatan_armada->kode_perawatan->keterangan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($perawatan_armada->created_at)->locale('id')->isoFormat('DD MMMM YYYY, HH:mm') }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/perawatan-armada/ubah/'.$perawatan_armada->id) }}" class="text-decoration-none">
                                                <i class="fas fa-edit text-warning"></i> &emsp;
                                            </a>
                                            <a href="{{ url('admin/perawatan-armada/hapus/'.$perawatan_armada->id) }}" class="text-decoration-none" onclick="return confirm('Apakah anda yakin untuk menghapus data Perawatan Armada - {{ $perawatan_armada->armada_bus->nama }}?')">
                                                <i class="fas fa-trash-alt text-danger"></i></td>
                                            </a>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-danger text-center" role="alert">
                                                Data Kosong
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $data_perawatan_armada->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
    
    {{-- FullCalendar --}}
    <script src='{{ asset('vendor/fullcalendar/dist/index.global.js') }}'></script>
    <script src='{{ asset('vendor/fullcalendar/package/core/locales/id.global.min.js') }}'></script>
    <script>
        $(document).ready(function() {
            $('#accordion').on('shown.bs.collapse', function() {
                var calendarEl = document.getElementById('calendar');
                    if (!calendarEl.fc) {
                        var jadwal = @json($events);
                        var myCalendar = new FullCalendar.Calendar(calendarEl, {
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
                                var content = 'Start: ' + info.event.startStr + '<br>End: ' + info.event.endStr;
                                $(info.el).popover({
                                    title: info.event.startStr,
                                    content: info.event.title,
                                    trigger: 'manual',
                                    placement: 'top',
                                    container: 'body',
                                    html: true
                                });
                                $(info.el).popover('toggle'); // Show the popover
                            }
                        });
                        calendarEl.fc = myCalendar; // Store the FullCalendar instance in a property of the calendar element
                    }
                calendarEl.fc.render(); // Refresh the FullCalendar when the accordion section becomes visible
            });
        });
    </script>

@endsection      