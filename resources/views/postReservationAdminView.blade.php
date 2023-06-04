@component('mail::message')
Reservasi masuk<br>

<h2 style="text-align: center">Reservasi <code>{{ $kodeReservasi }}</code> <br> Telah Dibuat</h2> 

@component('mail::panel')
<strong>Penyewa:</strong> {{ $namaUser }}<br>
<strong>Kode Reservasi:</strong> {{ $kodeReservasi }}<br>
<strong>Tanggal Sewa:</strong> {{ $tanggalMulai }} - {{ $tanggalSelesai }}<br>
<strong>Kota Penjemputan:</strong> {{ $kotaJemput }}<br>
<strong>Kota Tujuan:</strong> {{ $kotaTujuan }}<br>
<strong>Armada Bus:</strong> {{ $armadaBus }}<br>
<strong>Total:</strong> {{ $totalHarga }}<br>
@endcomponent

@endcomponent