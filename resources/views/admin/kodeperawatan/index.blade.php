@extends('admin.layout')
@section('title', 'Kode Perawatan')
@section('content')

<script type="text/javascript">
    document.getElementById('kodeperawatan').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form method="GET" action="/admin/kode-perawatan"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search dropshadowlight">
                    <div class="input-group">
                        <input type="text" name="searchInput" class="form-control bg-light border-0 small" placeholder="Pencarian"
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
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Kode Perawatan</h6>
                    <a href="/admin/kode-perawatan/tambah">
                        <i class="fas fa-plus text-primary"></i>
                    </a>
                </div>
                <!-- Card Body -->
                <div class="card-body table-responsive">
                    <table class="table" id="datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">@sortablelink('kode', 'Kode', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col">@sortablelink('keterangan', 'Keterangan', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col">@sortablelink('kategori', 'Kategori Barang', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_kode_perawatan as $key =>$kode_perawatan)
                            <tr>
                                <th scope="row">{{ $data_kode_perawatan->firstItem()+$key }}</th>
                                <td>{{ $kode_perawatan->kode }}</td>
                                <td>{{ $kode_perawatan->keterangan }}</td>
                                <td><span class="badge rounded-pil text-capitalize {{ $kode_perawatan->kategori === 'Barang habis pakai' ? 'bg-danger' : 'bg-success' }} text-light ">
                                        {{ $kode_perawatan->kategori }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ url('admin/kode-perawatan/ubah/'.$kode_perawatan->id) }}" class="text-decoration-none">
                                        <i class="fas fa-edit text-warning"></i>&nbsp;
                                    </a>
                                    <a href="{{ url('admin/kode-perawatan/hapus/'.$kode_perawatan->id) }}" class="text-decoration-none" onclick="return confirm('Apakah anda yakin untuk menghapus data Kode Perawatan {{ $kode_perawatan->kode }}?')">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-danger text-center" role="alert">
                                        Belum ada data
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $data_kode_perawatan->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection      