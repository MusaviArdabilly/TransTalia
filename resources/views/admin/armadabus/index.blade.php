@extends('admin.layout')
@section('title', 'Armada Bus')
@section('content')

<script type="text/javascript">
    document.getElementById('armadabus').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="col-12 minvh100-171">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Armada Bus</h6>
                    <a href="/admin/armada-bus/tambah">
                        <i class="fas fa-plus text-primary"></i>
                    </a>
                </div>
                <!-- Card Body -->
                <div class="card-body table-responsive">
                    <table class="table table-hover" id="datatable">
                        <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">@sortablelink('nama', 'Nama Bus', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col">@sortablelink('kursi', 'Kursi', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col">@sortablelink('sassis', 'Sasis', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col">@sortablelink('jenis_bus', 'Jenis Bus', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col">@sortablelink('harga_sewa', 'Harga Sewa', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col">@sortablelink('plat_nomor', 'Plat Nomor', [], ['class' => 'text-decoration-none text-secondary'])</th>
                            <th scope="col" class="text-center">Posisi</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($data_armada_bus as $key => $armada_bus)
                                <tr>
                                    <th scope="row">{{ $data_armada_bus->firstItem()+$key }}</th>
                                    <td class="align-middle"><img src="/assets/images/armada_bus/{{ $armada_bus->gambar }}" class="tumbnail_armada_bus rounded"> {{ $armada_bus->nama }}</td>
                                    <td class="align-middle">{{ $armada_bus->kursi }}</td>
                                    <td class="align-middle">{{ $armada_bus->sassis }}</td>
                                    <td class="align-middle">{{ $armada_bus->jenis_bus }}</td>
                                    <td class="align-middle">{{ $armada_bus->harga_sewa }}</td>
                                    <td class="align-middle">{{ $armada_bus->plat_nomor }}</td>
                                    <td class="align-middle text-center">
                                        @if(isset($armada_bus->gps))
                                        <a href="{{ $armada_bus->gps }}">
                                            <i class="fas fa-map-marked-alt"></i>
                                        </a>
                                        @else<i class="fas fa-eye-slash"></i>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ url('admin/armada-bus/ubah/'.$armada_bus->id) }}" class="text-decoration-none">
                                            <i class="fas fa-edit text-warning"></i> &emsp;
                                        </a>
                                        <a href="{{ url('admin/armada-bus/hapus/'.$armada_bus->id) }}" class="text-decoration-none" onclick="return confirm('Apakah anda yakin untuk menghapus data Armada Bus - {{ $armada_bus->nama }}?')">
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
                    <div class="d-flex justify-content-end">
                        {{ $data_armada_bus->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection      