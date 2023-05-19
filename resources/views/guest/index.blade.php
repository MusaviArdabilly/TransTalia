@extends('public-layout')
@section('title', 'Beranda - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('beranda').classList.add('border-bottom', 'border-dark', 'rounded-bottom');
</script>

    <section id="hero">
        <div class="hero-container">
            <h1>Trans Talia</h1>
            <h2>Menyediakan jasa yang bergerak di bidang transportasi darat</h2>
            <a href="/jadwal" class="btn-get-started text-light">Lihat Jadwal</a>
        </div>
    </section>

    <section id="menyediakan-layanan" class="bg-light2">
        <div class="container wow fadeIn py-5">
            <h3 class="text-center text-body fw-bold py-5">MENYEDIAKAN LAYANAN</h3>
            <div class="row counters px-2">
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-bus-alt fs-1 my-4 text-primary"></i>
                    <h4 class="text-dark">Trip Wisata</h4>
                    <p>kegiatan perjalanan yang dilakukan dengan tujuan untuk berlibur, mengunjungi tempat-tempat menarik, dan menikmati pengalaman-pengalaman baru.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-bus fs-1 my-4 text-primary"></i>
                    <h4 class="text-dark">Pariwisata</h4>
                    <p>Kegiatan rekreasi yang dilakukan oleh wisatawan di luar lingkungan tempat tinggal mereka. Mulai dari pariwisata alam, sejarah, budaya, hingga pariwisata olahraga.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fa fa-bus-alt fs-1 my-4 text-primary"></i>
                    <h4 class="text-dark">Trip Ziarah</h4>
                    <p>Kegiatan perjalanan yang dilakukan oleh umat agama ke tempat-tempat yang dianggap suci atau memiliki nilai religius yang penting dalam kepercayaan mereka.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-book-open fs-1 my-4 text-primary"></i>
                    <h4 class="text-dark">Study Tour</h4>
                    <p>Kegiatan perjalanan yang diorganisir oleh institusi pendidikan, seperti sekolah atau universitas, dengan tujuan memberikan pengalaman belajar di luar kelas.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-industry fs-1 my-4 text-primary"></i>
                    <h4 class="text-dark">Kunjungan Industri</h4>
                    <p>Kegiatan perjalanan yang diorganisir untuk peserta untuk mengunjungi perusahaan atau lokasi lain yang berkaitan dengan produksi atau industri tertentu.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-plus-circle fs-1 my-4 text-primary"></i>
                    <h4 class="text-dark">Tambahan Fasilitas</h4>
                    <p>Trans Talia juga menyediakan layanan untuk penambahan fasilitas pada bus yang disewa sehingga penumpang bisa dengan nyaman melakukan perjalanan.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="informasi-kami" class="bg-light3">
        <div class="container wow fadeIn py-5">
            <h3 class="text-center text-body fw-bold py-5">INFORMASI KAMI</h3>
            <div class="row counters mt-5">
                <div class="col-lg-4 col-12 text-center">
                    <span data-toggle="counter-up" class="text-primary fs-1">11<sup>+</sup></span>
                    <p>Armada Bus</p>
                </div>
                <div class="col-lg-4 col-6 text-center">
                    <span data-toggle="counter-up" class="text-primary fs-1">590<sup>+</sup></span>
                    <p>Perjalanan</p>
                </div>
                <div class="col-lg-4 col-6 text-center">
                    <span data-toggle="counter-up" class="text-primary fs-1">25<sup>+</sup></span>
                    <p>Karyawan</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Navbar Scroll Effect
        jQuery(document).ready(function ($) {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 20) {
                    $('.back-to-top').fadeIn('slow');
                    $('.navbar').removeClass('py-3 text-light');
                    $('.navbar').addClass('bg-light shadow')
                    $('.nav-link').removeClass('text-light');
                } else {
                    $('.back-to-top').fadeOut('slow');
                    $('.navbar').addClass('py-3 text-light');
                    $('.navbar').removeClass('bg-light shadow');
                    $('.nav-link').addClass('text-light');
                }
            });
            $('.back-to-top').click(function () {
                $('html, body').animate({
                scrollTop: 0
                }, 1500, 'easeInOutExpo');
                return false;
            });
        });
        jQuery(document).ready(function ($) {
            $('.nav-link').removeClass('text-body');
            $('.vr').removeClass('text-body');
            $('.nav-link').addClass('text-light');
            $('.vr').addClass('text-light');
            $(window).scroll(function () {
                if ($(this).scrollTop() > 20) {
                    $('.vr').addClass('text-body');
                } else {
                    $('.vr').removeClass('text-body');
                }
            });
        });
    </script>

@endsection