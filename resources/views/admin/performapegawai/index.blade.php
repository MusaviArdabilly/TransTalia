@extends('admin.layout')
@section('title', 'Performa Pegawai')
@section('content')

<script type="text/javascript">
    document.getElementById('performapegawai').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form action="/admin/performa-pegawai" 
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
        </div>

        <div class="col-12 minvh100-233">
            
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Performa Pegawai</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="barPerformaPegawai"></canvas>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Performa Pegawai</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@sortablelink('user.nama_depan', 'Nama Pegawai', [], ['class' => 'text-decoration-none text-secondary'])</th>
                                    <th scope="col">@sortablelink('jumlah_order', 'Jumlah Order', [], ['class' => 'text-decoration-none text-secondary'])</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($data_pegawai as $key => $pegawai)
                                    <tr>
                                        <th scope="row">{{ $data_pegawai->firstItem()+$key }}</th>
                                        <td>{{ $pegawai->user->nama_depan }} {{ $pegawai->user->nama_belakang }}</td>
                                        <td>{{ $pegawai->jumlah_order }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/performa-pegawai/ubah/'.$pegawai->id) }}">
                                                <i class="fas fa-edit text-warning"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-danger text-center" role="alert">
                                                Data Kosong
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $data_pegawai->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

    <script>
        var data_array_pegawai = @json($array_pegawai);
    </script> 

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('js/chart/performa_pegawai.js') }}"></script>

@endsection      