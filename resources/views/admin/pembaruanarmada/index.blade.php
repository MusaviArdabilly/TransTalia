@extends('admin.layout')
@section('title', 'Perawatan Armada')
@section('content')

<script type="text/javascript">
  document.getElementById('pembaruanarmada').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form action="/admin/pembaruan-armada"
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
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pembaruan Armada</h6>
                    <a href="/admin/pembaruan-armada/tambah"><i class="fas fa-plus text-primary"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@sortablelink('armada_bus.nama', 'Nama Bus', [], ['class' => 'text-decoration-none text-secondary'])</th>
                                    <th scope="col">@sortablelink('pembaruan', 'Pembaruan', [], ['class' => 'text-decoration-none text-secondary'])</th>
                                    <th scope="col">@sortablelink('created_at', 'Waktu', [], ['class' => 'text-decoration-none text-secondary'])</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_pembaruan_armada as $key => $pembaruan_armada)
                                <tr>
                                    <th scope="row">{{ $data_pembaruan_armada->firstItem()+$key }}</th>
                                    <td>{{ $pembaruan_armada->armada_bus->nama }}</td>
                                    <td>{{ $pembaruan_armada->pembaruan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pembaruan_armada->created_at)->locale('id')->isoFormat('DD MMMM YYYY, HH:mm') }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/pembaruan-armada/ubah/'.$pembaruan_armada->id) }}" class="text-decoration-none">
                                            <i class="fas fa-edit text-warning"></i> &emsp; 
                                        </a>
                                        <a href="{{ url('admin/pembaruan-armada/hapus/'.$pembaruan_armada->id) }}" class="text-decoration-none" onclick="return confirm('Apakah anda yakin untuk menghapus data Pembaruan Armada - {{ $pembaruan_armada->armada_bus->nama }}?')">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
                                    </td>
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
                            {{ $data_pembaruan_armada->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection      