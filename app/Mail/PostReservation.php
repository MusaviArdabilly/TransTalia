<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostReservation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($nama_user,$kode_reservasi, $tanggal_mulai, $tanggal_selesai, $kota_jemput, $kota_tujuan, $armada_bus, $total_harga)
    {
        //
        $this->nama_user = $nama_user;
        $this->kode_reservasi = $kode_reservasi;
        $this->tanggal_mulai = $tanggal_mulai;
        $this->tanggal_selesai = $tanggal_selesai;
        $this->kota_jemput = $kota_jemput;
        $this->kota_tujuan = $kota_tujuan;
        $this->armada_bus = $armada_bus;
        $this->total_harga = $total_harga;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Post Reservation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'postReservationView',
            with: [
                'namaUser' => $this->nama_user,
                'kodeReservasi' => $this->kode_reservasi,
                'tanggalMulai' => $this->tanggal_mulai,
                'tanggalSelesai' => $this->tanggal_selesai,
                'kotaJemput' => $this->kota_jemput,
                'kotaTujuan' => $this->kota_tujuan,
                'armadaBus' => $this->armada_bus,
                'totalHarga' => $this->total_harga
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
