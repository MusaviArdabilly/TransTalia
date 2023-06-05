@extends('public-layout')
@section('title', 'Profil - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('profil').classList.add('border-bottom', 'border-dark', 'rounded-bottom');
    document.getElementById('navbar').classList.remove('py-3');
    document.getElementById('navbar').classList.add('bg-light');
</script>

    <div class="fake-navbar"></div>
    <section class="bg-light2">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6 py-2 py-md-5">
                    <img src="{{ asset('assets/3x2/TRM1.jpg') }}" class="img-fluid">
                </div>
                <div class="col-md-6 py-2 py-md-5 f-poppins d-flex align-items-md-center justify-content-center">
                    <div>
                        <h3 class="text-center text-md-start text-body fw-bold">TENTANG</h3>
                        <h2 class="fw-bold mb-3 text-success-emphasis">Trans Talia</h2>
                        <P>Trans Talia adalah perusahaan jasa yang bergerak dibidang transportasi darat. Berdiri sejak tahun 2008, PO. Trans Talia memulai bisnis dengan satu bus yang berukuran medium. Sekarang memiliki 12 armada bus yang terbagi menjadi dua kategori yaitu big bus dan medium bus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-light3">
        <div class="container py-5">
            <div class="container py-2 py-md-5">
                <div class="f-poppins">
                    <h3 class="text-center fw-bold text-body">LOKASI</h3>
                    <p class="text-center">PO Trans Talia Beroperasi di Kabupaten Jombang, Jawa Timur</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d506247.028906027!2d112.26581816869665!3d-7.568992532492812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e786c590eec46d3%3A0xd3b75dc4dc30a5d7!2sTRANSTALIA%20BUS%20GARAGE!5e0!3m2!1sid!2sid!4v1678680509527!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-light4">
        <div class="container py-5">
            <div class="container py-2 py-md-5">
                <div class="f-poppins">
                    <h3 class="text-center fw-bold text-body">KONTAK</h3>
                    <p class="text-center">Temukan cara terbaik untuk menghubungi kami dan jangan ragu untuk mengajukan pertanyaan atau memberikan umpan balik</p>
                    <div class="row d-flex justify-content-between">
                        <div class="col-4 pt-5 text-center">
                            <a href="mailto:admin@transtalia.com" class="text-decoration-none text-secondary">
                                <i class="fas fa-envelope fa-lg fa-2x mb-3"></i>
                                <h4 class="fw-semibold">Email</h4>
                            </a>
                        </div>
                        <div class="col-4 pt-5 text-center">
                            <a href="https://wa.me/6282233994239" class="text-decoration-none text-success">
                                <i class="fab fa-whatsapp fa-lg fa-2x mb-3"></i>
                                <h4 class="fw-semibold">Whatsapp</h4>
                            </a>
                        </div>
                        <div class="col-4 pt-5 text-center">
                            <a href="https://www.facebook.com/groups/1927045797604887/?locale=id_ID" class="text-decoration-none text-primary">
                                <i class="fab fa-facebook fa-lg fa-2x mb-3"></i>
                                <h4 class="fw-semibold">Facebook</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function ($) {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.back-to-top').fadeIn('slow');
                    $('#header').addClass('py-2').removeClass('py-3');
                } else {
                    $('.back-to-top').fadeOut('slow');
                    $('#header').removeClass('py-2').addClass('py-3');
                }
            });
            $('.back-to-top').click(function () {
                $('html, body').animate({
                scrollTop: 0
                }, 1500, 'easeInOutExpo');
                return false;
            });
        });
    </script>

@endsection