@extends('admin.layout')
@section('title', 'Pegawai')
@section('content')

<script type="text/javascript">
    document.getElementById('pegawai').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Pegawai</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form method="POST" action="{{ url('/admin/pegawai/ubah/'.$pegawai->id.'/post') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputJabatan">Cari Pengguna</label>
                                    <select name="user_id" class="form-control select2" aria-label="Default select" id="inputJabatan">
                                        <option selected value="{{ $pegawai->user_id }}">{{ $pegawai->user->nama_depan }} {{ $pegawai->user->nama_belakang }} - {{ $pegawai->user->no_telp }}</option>
                                    </select>
                                    @if ($errors->has('user_id'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('user_id') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputJabatan">Jabatan</label>
                                    <select name="jabatan" class="form-control" aria-label="Default select" id="inputJabatan">
                                        <option value="sopir" {{ $pegawai->jabatan == 'sopir' ? 'selected' : '' }}>Sopir</option>
                                        <option value="kenek" {{ $pegawai->jabatan == 'kenek' ? 'selected' : '' }}>Kenek</option>
                                        <option value="it_support" {{ $pegawai->jabatan == 'it_support' ? 'selected' : '' }}>IT Support</option>
                                        <option value="mekanik" {{ $pegawai->jabatan == 'mekanik' ? 'selected' : '' }}>Mekanik</option>
                                    </select>
                                    @if ($errors->has('jabatan'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('jabatan') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label>Alamat</label>
                                    <div class="row px-2">
                                        <div class="col-4">
                                            <label for="editAlamatKota">Kota</label>
                                            <select name="kota" class="form-control" aria-label="Default select1" id="editAlamatKota">
                                                <option value="0" disable selected>Pilih Kota</option>
                                                @foreach ($data_kota as $kota)
                                                <option value="{{ $kota->id }}"  {{ $pegawai->alamat->kota_id == $kota->id ? 'selected' : '' }}>{{ $kota->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="editAlamatKecamatan">Kecamatan</label>
                                            <select name="distrik" class="form-control" aria-label="select2" id="editAlamatKecamatan">
                                                <option value="0" disable="true" selected>Pilih Kecamatan</option>
                                            </select>
                                            <input type="hidden" id="distrik_id" value="{{ $pegawai->alamat->distrik_id }}"> {{-- helper passing value of laravel variable --}}
                                        </div>
                                        <div class="col-4">
                                            <label for="editAlamatDesa" >Desa</label>
                                            <select name="desa" class="form-control" aria-label="select3" id="editAlamatDesa">
                                                <option value="0" disable="true" selected>Pilih Desa</option>
                                            </select>
                                            <input type="hidden" id="desa_id" value="{{ $pegawai->alamat->desa_id }}"> {{-- helper passing value of laravel variable --}}
                                        </div>
                                    </div>
                                    @if ($errors->has('desa'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('desa') }}</span>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="inputJumlahOrder">Jumlah Order</label>
                                    <input type="number" name="jumlah_order" class="form-control" id="inputJumlahOrder" value="{{ old('jumlah_order', $pegawai->jumlah_order) }}">
                                    @if ($errors->has('jumlah_order'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('jumlah_order') }}</span>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary mr-4">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection