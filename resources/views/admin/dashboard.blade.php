@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')

<script type="text/javascript">
    document.getElementById('dashboard').classList.add('active');
    document.getElementById('search-bar').classList.remove('d-sm-inline-block');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- Content Row Card -->
        <div class="row">

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="small font-weight-bold text-info text-capitalize mb-1">
                                    Reservasi ({{ \Carbon\Carbon::parse(now())->locale('id')->isoFormat('MMMM') }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $reservasi_bulanan }} <br>
                                    <span class="text-xs text-secondary">{{ $reservasi_bulanan_menunggu }} Menunggu, {{ $reservasi_bulanan_dibayar }} Dibayar, {{ $reservasi_bulanan_lunas }} Lunas, {{ $reservasi_bulanan_batal }} Batal</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="small font-weight-bold text-warning text-capitalize mb-1">
                                    Transaksi ({{ \Carbon\Carbon::parse(now())->locale('id')->isoFormat('MMMM') }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $transaksi_bulanan }} <br>
                                    <span class="text-xs text-secondary">{{ $transaksi_bulanan_uang_muka }} Uang Muka, {{ $transaksi_bulanan_cicilan }} Cicilan, {{ $transaksi_bulanan_pelunasan }} Pelunasan</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="small font-weight-bold text-primary text-capitalize mb-1">
                                    Transaksi Masuk ({{ \Carbon\Carbon::parse(now())->locale('id')->isoFormat('MMMM') }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($pemasukan_bulanan, 0, ',', '.') }}</div>
                                <span class="text-xs text-secondary">&nbsp;</span>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="small font-weight-bold text-success text-capitalize mb-1">
                                    Transaksi Masuk ({{ \Carbon\Carbon::parse(now())->locale('id')->isoFormat('YYYY') }})</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ number_format($pemasukan_tahunan, 0, ',', '.') }}</div>
                                <span class="text-xs text-secondary">&nbsp;</span>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow border-left-warning mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-warning">Transaksi Masuk ({{ now()->year }})</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body p-0 p-md-3">
                        <div class="chart-area">
                            <canvas id="areaKasMasuk"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->
            <div class="col-12">
                <div class="card shadow border-left-success mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Ringkasan Pendapatan ({{ now()->year }})</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body p-0 p-md-3">
                        <div class="chart-area">
                            <canvas id="areaRingkasanPendapatan"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Column -->
            {{-- <div class="col-xl-4 col-lg-5">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Penggunaan Bus ({{ now()->format('F') }})</h6>
                    </div>
                    <div class="card-body">
                                    <h4 class="small font-weight-bold">EMERALD<span
                                            class="float-right">10%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #b15928; width: 10%"
                                            aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">EMINENENCE<span
                                            class="float-right">8%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #ffff99; width: 8%"
                                            aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">INTERCEPTOR<span
                                            class="float-right">7%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #6a3d9a; width: 7%"
                                            aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">BERYL<span
                                            class="float-right">5%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #cab2d6; width: 5%"
                                            aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">CONVINCER<span
                                            class="float-right">12%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #ff7f00; width: 12%"
                                            aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">VENCENDOR<span
                                            class="float-right">15%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #fdbf6f; width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">RESOLUTE<span
                                            class="float-right">5%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #e31a1c; width: 5%"
                                            aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">ALFAYIZ<span
                                            class="float-right">9%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #fb9a99; width: 9%"
                                            aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">INTERPID<span
                                            class="float-right">3%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #33a02c; width: 3%"
                                            aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">AURORA<span
                                            class="float-right">15%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #b2df8a; width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">ORION<span
                                            class="float-right">5%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #1f78b4; width: 5%"
                                            aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">ELF<span
                                            class="float-right">2%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="background-color: #a6cee3; width: 2%"
                                            aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                    </div>
                </div>

            </div> --}}

        </div>

    </div>
    <!-- End of Main Content -->

    <script>
        var data_array_pendapatan = @json($array_pendapatan);
        var data_array_transaksi = @json($array_transaksi);
    </script> 

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('js/chart/ringkasan_pendapatan.js') }}"></script>
    
@endsection      