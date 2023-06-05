@extends('admin.layout')
@section('title', 'Reservasi')
@section('content')

<script type="text/javascript">
    document.getElementById('reservasi').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block mr-3">
                <!-- Topbar Search -->
                <form method="GET" action="/admin/reservasi"
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

        <div class="col-12 minvh100-233">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Reservasi</h6>
                    <div>
                        <form method="GET" action="/admin/reservasi"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search dropshadowlight">
                            <div class="input-group">
                                <select class="form-control bg-light border-0 small" name="filter">
                                    <option {{ $filter === '' ? 'selected' : '' }} value="">Semua</option>
                                    <option {{ $filter === 'menunggu' ? 'selected' : '' }} value="menunggu">Menunggu</option>
                                    <option {{ $filter === 'dibayar' ? 'selected' : '' }} value="dibayar">Dibayar</option>
                                    <option {{ $filter === 'lunas' ? 'selected' : '' }} value="lunas">Lunas</option>
                                    <option {{ $filter === 'batal' ? 'selected' : '' }} value="batal">Batal</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-filter"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            {{-- <th scope="col">@sortablelink('user.nama_depan', ' Nama', [], ['class' => 'text-decoration-none text-secondary'])</th> --}}
                            <th scope="col">Kode</th>
                            <th scope="col">Nama Penyewa</th>
                            <th scope="col">Waktu</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Armada Bus</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Dibayar</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($data_reservasi as $key => $reservasi)
                            <tr>
                                <th class="text-capitalize" scope="row">{{ $data_reservasi->firstItem()+$key }}</th>
                                <td class="text-capitalize">{{ $reservasi->kode }}</td>
                                <td class="text-capitalize">{{ $reservasi->user->nama_depan }} <br> {{ $reservasi->user->nama_belakang }}</td>
                                <td class="text-capitalize">{{ \Carbon\Carbon::parse($reservasi->tanggal_mulai)->locale('id')->isoFormat('DD MMM YYYY') }} <br> {{ \Carbon\Carbon::parse($reservasi->tanggal_selesai)->locale('id')->isoFormat('DD MMM YYYY') }}</td>
                                @php
                                    $value = $reservasi->kota_tujuan;
                                    // Split the string by commas
                                    $parts = explode(',', $value);
                                @endphp
                                <td class="text-capitalize">{{ $parts[0] }} <br> {{ $parts[1] }} <br> @isset($parts[2]){{ $parts[2] }}@endisset</td>
                                <td class="text-capitalize">
                                    @foreach($reservasi->reservasi_armada_bus as $data_armada_bus)
                                    {{ $data_armada_bus->armada_bus->nama }} - Rp. {{ number_format($data_armada_bus->sub_total, 0, ',', '.') }} <br>
                                    @endforeach
                                </td>
                                <td class="text-capitalize">Rp. {{ number_format($reservasi->total_harga, 0, ',', '.') }}</td>
                                <td class="text-capitalize">Rp. {{ number_format($reservasi->dibayar, 0, ',', '.') }}</td>
                                <td class="text-capitalize text-center">
                                    <span class="badge rounded-pil text-capitalize text-light w-100 {{ $reservasi->status === 'batal' ? 'bg-danger' : '' }} {{ $reservasi->status === 'menunggu' ? 'bg-secondary' : '' }} {{ $reservasi->status === 'dibayar' ? 'bg-primary' : '' }} {{ $reservasi->status === 'lunas' ? 'bg-success' : '' }}">
                                        {{  ucwords(str_replace('_', ' ', $reservasi->status)) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('admin/reservasi/ubah/'.$reservasi->id) }}" class="text-decoration-none">
                                        <i class="fas fa-edit text-warning"></i>&nbsp; 
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">
                                    <div class="alert alert-danger text-center" role="alert">
                                        Data Kosong
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $data_reservasi->links() }}
                    </div>
                </div>
            </div>
        </div>

        

    </div>
    <!-- End of Main Content -->

@endsection      