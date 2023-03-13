@extends('guest.layout')
@section('title', 'Profil - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('profil').classList.add('fw-bold', 'border-bottom', 'border-primary', 'rounded-bottom');
    document.getElementById('header').classList.add('header-fixed');
</script>

    {{-- <div class="minvh100-157">
        <div class="container py-2">
            <div class="row py-5">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    <h3>Tentang</h3>
                    <h1 class="fw-semi-bold">Trans Talia</h1>
                     berawal dari tahun 2008 (sejarah) 
                    <P>Trans Talia adalah perusahaan jasa yang bergerak dibidang transportasi darat. <br> Memiliki (10) armada bus yang terbagi menjadi dua kategori yaitu big bus dan medium bus.</p>
                </div>
            </div>
        </div>
    </div> --}}
    
    <div class="container py-2 mt-5">
        <div class="row py-md-5 mt-5">
            <div class="col-md-6 mt-5 mt-sm-2">
                <img src="{{ asset('assets/3x2/TRM1.jpg') }}" class="img-fluid">
            </div>
            <div class="col-md-6 mt-4 mt-sm-2 d-flex align-items-center">
                <div>
                    <h3>Tentang</h3>
                    <h1 class="fw-semi-bold">Trans Talia</h1>
                     berawal dari tahun 2008 (sejarah) 
                    <P>Trans Talia adalah perusahaan jasa yang bergerak dibidang transportasi darat. <br> Memiliki (10) armada bus yang terbagi menjadi dua kategori yaitu big bus dan medium bus.</p>
                </div>
            </div>
        </div>
    </div>
    
    <section id="contact">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Lokasi</h3>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>
        </div>
        <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d506247.028906027!2d112.26581816869665!3d-7.568992532492812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e786c590eec46d3%3A0xd3b75dc4dc30a5d7!2sTRANSTALIA%20BUS%20GARAGE!5e0!3m2!1sid!2sid!4v1678680509527!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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