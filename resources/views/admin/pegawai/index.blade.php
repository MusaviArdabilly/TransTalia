@extends('admin.layout')
@section('title', 'Pegawai')
@section('content')

<script type="text/javascript">
    document.getElementById('pegawai').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-none d-sm-inline-block">
                <!-- Topbar Search -->
                <form method="GET" action="/admin/pegawai"
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
            <div class="d-none d-sm-inline-block btn bg-primary text-white shadow-sm">
                {{ str_replace('-', ' ', now()->format('d-M-y')) }}
            </div>
        </div>

        <div class="col-12 minvh100-233">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pegawai</h6>
                    <a href="/admin/pegawai/tambah"><i class="fas fa-plus text-primary"></i></a>
                </div>
                <!-- Card Body -->
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">@sortablelink('nama_depan', ' Nama')</th>
                            <th scope="col">@sortablelink('jabatan', 'Jabatan')</th>
                            <th scope="col">@sortablelink('alamat', 'Alamat')</th>
                            <th scope="col">@sortablelink('no_hp', 'No. Hp')</th>
                            <th scope="col" class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_pegawai as $key => $pegawai)
                            <tr>
                                <th class="text-capitalize" scope="row">{{ $data_pegawai->firstItem()+$key }}</th>
                                <td class="text-capitalize">{{ $pegawai->user->nama_depan }} {{ $pegawai->user->nama_belakang }}</td>
                                <td class="text-capitalize">{{ str_replace('_', ' ', $pegawai->jabatan) }}</td>
                                <td class="text-capitalize">
                                    {{ strtolower($pegawai->alamat->village->name)  }}, 
                                    {{ strtolower($pegawai->alamat->district->name) }}, 
                                    {{ strtolower(str_replace(['KABUPATEN', 'KOTA'], ['Kab.', 'Kota'], $pegawai->alamat->city->name)) }}
                                </td>
                                <td>+62{{ $pegawai->user->no_telp }}</td>
                                <td class="text-center">
                                    <a href="{{ url('admin/pegawai/ubah/'.$pegawai->id) }}" class="text-decoration-none">
                                        <i class="fas fa-edit text-warning"></i>&nbsp; 
                                    </a>
                                    <a href="{{ url('admin/pegawai/hapus/'.$pegawai->id) }}" class="text-decoration-none" onclick="return confirm('Apakah anda yakin untuk menghapus data Pegawai - {{ $pegawai->user->nama_depan }}?')">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
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