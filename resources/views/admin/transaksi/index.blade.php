@extends('admin.layout')
@section('title', 'Transaksi')
@section('content')

<script type="text/javascript">
    document.getElementById('transaksi').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form method="GET" action="/admin/transaksi" 
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
                    <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
                    <a href="/admin/transaksi/tambah"><i class="fas fa-plus text-primary"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Reservasi</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Nominal Transaksi</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_transaksi as $key => $transaksi)
                                <tr>
                                    <th scope="row">{{ $data_transaksi->firstItem()+$key }}</th>
                                    <td>{{ $transaksi->reservasi->kode }}</td>
                                    {{-- <td>Rp. {{ number_format($transaksi->reservasi->total_harga, 0, ',', '.') }}</td>
                                    <td>Rp. {{ number_format($transaksi->reservasi->dibayar, 0, ',', '.') }}</td> --}}
                                    <td>{{ $transaksi->reservasi->user->nama_depan }} {{ $transaksi->reservasi->user->nama_belakang }}</td>
                                    <td>Rp. {{ number_format($transaksi->nominal, 0, ',', '.') }}</td>
                                    <td>{{ ucwords(str_replace('_', ' ', $transaksi->keterangan)) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaksi->created_at)->locale('id')->isoFormat('DD MMMM YYYY - hh:mm')  }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/transaksi/ubah/'.$transaksi->id) }}" class="text-decoration-none">
                                            <i class="fas fa-edit text-warning"></i>&nbsp; 
                                        </a>
                                        <a href="{{ url('admin/transaksi/hapus/'.$transaksi->id) }}" class="text-decoration-none" onclick="return confirm('Apakah anda yakin untuk menghapus data Transaksi {{ $transaksi->reservasi->kode }} - {{ $transaksi->reservasi->total_harga }}?')">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty 
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- End of Main Content -->

@endsection      