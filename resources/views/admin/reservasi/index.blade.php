@extends('admin.layout')
@section('title', 'Pegawai')
@section('content')

<script type="text/javascript">
    document.getElementById('reservasi').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form method="GET" action="/admin/reservasi"
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search dropshadowlight">
                    <div class="input-group">
                        <input type="text" name="search" value="" class="form-control bg-light border-0 small" placeholder="Pencarian"
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-none d-sm-inline-block btn bg-primary text-white shadow-sm">
                {{ str_replace('-', ' ', now()->format('d-M-y')) }}
            </div>
        </div>

        <div class="col-12 minvh100-233">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-start">
                    <h6 class="m-0 font-weight-bold text-primary">Reservasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            {{-- <th scope="col">@sortablelink('user.nama_depan', ' Nama', [], ['class' => 'text-decoration-none text-secondary'])</th> --}}
                            <th scope="col">Nama Penyewa</th>
                            <th scope="col">Tanggal Mulai</th>
                            <th scope="col">Tanggal Selesai</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Dibayar</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_reservasi as $key => $reservasi)
                            <tr>
                                <th class="text-capitalize" scope="row">{{ $data_reservasi->firstItem()+$key }}</th>
                                <td class="text-capitalize">{{ $reservasi->user->nama_depan }} {{ $reservasi->user->nama_belakang }}</td>
                                <td class="text-capitalize">{{ $reservasi->tanggal_mulai }}</td>
                                <td class="text-capitalize">{{ $reservasi->tanggal_selesai }}</td>
                                <td class="text-capitalize">{{ $reservasi->tujuan }}</td>
                                <td class="text-capitalize">{{ $reservasi->total_harga }}</td>
                                <td class="text-capitalize">{{ $reservasi->dibayar }}</td>
                                <td class="text-capitalize">{{ $reservasi->status }}</td>
                                <td>
                                    <a href="{{ url('admin/reservasi/ubah/'.$reservasi->id) }}" class="text-decoration-none">
                                        <i class="fas fa-edit text-warning"></i>&nbsp; 
                                    </a>
                                    <a href="{{ url('admin/reservasi/hapus/'.$reservasi->id) }}" class="text-decoration-none" onclick="return confirm('Apakah anda yakin untuk menghapus data Reservasi - {{ $reservasi->user->nama_depan }}?')">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-danger text-center" role="alert">
                                        Data Kosong
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        

    </div>
    <!-- End of Main Content -->

@endsection      