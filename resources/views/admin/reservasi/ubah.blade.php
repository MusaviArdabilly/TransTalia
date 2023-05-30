@extends('admin.layout')
@section('title', 'Ubah Reservasi')
@section('content')

<script type="text/javascript">
    document.getElementById('reservasi').classList.add('active');
</script>

    <!-- Begin Page Content -->
    <div class="container-fluid py-2">

        <div class="col-12 minvh100-233">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Reservasi</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <form method="POST" action="{{ url('/admin/reservasi/ubah/'.$reservasi->id.'/post') }}">
                                @csrf
                                <input type="hidden" name="tanggal_mulai_lama" value="{{ $reservasi->tanggal_mulai }}">
                                <input type="hidden" name="tanggal_selesai_lama" value="{{ $reservasi->tanggal_selesai }}">
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6">
                                        <label for="inputKodeReservasi">Kode Reservasi</label>
                                        <input type="text" readonly name="kode_reservasi" class="form-control" id="inputKodeReservasi" value="{{ old('kode', $reservasi->kode) }}">
                                        @if ($errors->has('kode'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kode') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="inputJabatan">Penyewa</label>
                                        <select readonly name="user_id" class="form-control select2" aria-label="Default select" id="inputJabatan">
                                            <option selected value="{{ $reservasi->user_id }}">{{ $reservasi->user->nama_depan }} {{ $reservasi->user->nama_belakang }}</option>
                                        </select>
                                        @if ($errors->has('user_id'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('user_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6">
                                        <label for="inputTanggalMulai">Tanggal Mulai</label>
                                        <input type="date" readonly name="tanggal_mulai" class="form-control" id="inputTanggalMulai" value="{{ old('tanggal_mulai', $reservasi->tanggal_mulai) }}">
                                        @if ($errors->has('tanggal_mulai'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('tanggal_mulai') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="inputTanggalMulai">Tanggal Selesai</label>
                                        <input type="date" readonly name="tanggal_selesai" class="form-control" id="inputTanggalMulai" value="{{ old('tanggal_selesai', $reservasi->tanggal_selesai) }}">
                                        @if ($errors->has('tanggal_selesai'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('tanggal_selesai') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-6">
                                        <label for="inputTake">Kota Penjemputan</label>
                                        <input readonly type="text" name="kota_jemput" class="form-control" id="inputTake" value="{{ old('kota_jemput', $reservasi->kota_jemput) }}">
                                        @if ($errors->has('kota_jemput'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kota_jemput') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label for="inputDeliver">Kota Tujuan</label>
                                        <input readonly type="text" name="kota_tujuan" class="form-control" id="inputDeliver" value="{{ old('kota_tujuan', $reservasi->kota_tujuan) }}">
                                        @if ($errors->has('kota_tujuan'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('kota_tujuan') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="ArmadaBus">Armada Bus</label> <br>
                                    @foreach($reservasi->reservasi_armada_bus as $data_armada_bus)
                                        <span class="btn btn-primary disabled">{{ $data_armada_bus->armada_bus->nama }}</span>
                                    @endforeach
                                    @if ($errors->has('jumlah_order'))
                                    <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('jumlah_order') }}</span>
                                    @endif
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12 col-md-2">
                                        <label for="inputJabatan">Status</label> 
                                        <select name="status" class="form-control select2" aria-label="Default select" id="inputJabatan">
                                            <option value="batal"{{ $reservasi->status == 'batal' ? 'selected' : '' }}>Batal</option>
                                            <option value="menunggu"{{ $reservasi->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="dibayar"{{ $reservasi->status == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                                            <option value="lunas"{{ $reservasi->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                        </select>
                                        @if ($errors->has('status'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="inputJumlahOrder">Total Harga</label>
                                        <input type="number" name="total_harga" class="form-control" id="inputJumlahOrder" value="{{ old('total_harga', $reservasi->total_harga) }}">
                                        @if ($errors->has('total_harga'))
                                        <span class="ps-3 text-danger"><i class="fas fa-exclamation-circle"></i>&nbsp;{{ $errors->first('total_harga') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ URL::previous() }}" class="btn btn-outline-secondary mr-2">Batal</a>
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

    {{-- Handle autocomplate kota penjemputan dan kota tujuan  --}}
    <script>
        function cities(){
            var options = {
                types: ['(cities)'],
                componentRestrictions: { country: 'id' } 
            };
            
            var pickInput = document.getElementById('inputTake');
            var pickInputAutocomplete = new google.maps.places.Autocomplete(pickInput, options);
            
            var deliverInput = document.getElementById('inputDeliver');
            var deliverInputAutocomplete = new google.maps.places.Autocomplete(deliverInput, options);
        }
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3NfQbLS6VzWjfJqKAa-2UiHYyzAlfMRI&libraries=places&language=id&callback=cities"></script>
@endsection