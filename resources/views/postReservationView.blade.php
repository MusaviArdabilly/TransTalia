@component('mail::message')
Halo, {{ $namaUser }}<br>

<h2 style="text-align: center">Reservasi <code>{{ $kodeReservasi }}</code> <br> Telah Dibuat</h2> 

@component('mail::panel')
<strong>Kode Reservasi:</strong> {{ $kodeReservasi }}<br>
<strong>Tanggal Sewa:</strong> {{ $tanggalMulai }} - {{ $tanggalSelesai }}<br>
<strong>Kota Penjemputan:</strong> {{ $kotaJemput }}<br>
<strong>Kota Tujuan:</strong> {{ $kotaTujuan }}<br>
<strong>Armada Bus:</strong> {{ $armadaBus }}<br>
<strong>Total:</strong> {{ $totalHarga }}<br>
@endcomponent
Terima kasih telah menggunakan layanan kami! Untuk mempermudah proses pembayaran Anda, kami ingin mengingatkan Anda untuk segera menghubungi admin kami melalui WhatsApp. 
Anda dapat melakukan konfirmasi pembayaran dengan mengirimkan pesan melalui nomor berikut: +6282233994239 <br> <br>

Kami sangat menghargai kerja sama Anda dalam hal ini dan berharap dapat membantu Anda menyelesaikan pembayaran dengan lancar. Terima kasih atas perhatiannya, 
dan kami tunggu kabar dari Anda melalui WhatsApp <br><br>

<p style="text-align: right">
Salam hangat <br>
Admin Trans Talia.
</p> 


@component('mail::button', ['url' => 'https://wa.me/6282233994239'])
WhatsApp
@endcomponent

@endcomponent