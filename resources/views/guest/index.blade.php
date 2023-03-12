@extends('guest.layout')
@section('title', 'Beranda - Trans Talia')
@section('content')

<script type="text/javascript">
    document.getElementById('beranda').classList.add('fw-bold', 'border-bottom', 'border-primary', 'rounded-bottom');
</script>

    {{-- <div class="minvh100-157">
        <div id="carouselExample" class="carousel slide z-0">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/assets/carousel/dummy7.jpg') }}" class="d-block img-fluid object-fit-cover w-100" style="height: 500px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/assets/carousel/dummy5.jpg') }}" class="d-block img-fluid object-fit-cover w-100" style="height: 500px" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/assets/carousel/dummy6.jpg') }}" class="d-block img-fluid object-fit-cover w-100" style="height: 500px" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="container position-relative mt-n2 px-sm-0 px-lg-5 z-3">
            <div class="bg-light shadow rounded p-3 d-flex justify-content-center mx-lg-5">
                <span class="me-3 my-auto f-poppins">Cek Sekarang Ketersediaan Bus Yang Ada</span>
                <button class="btn bg-success text-white">Cek Jadwal</button>
            </div>
        </div>
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    asdasd
                </div>
            </div>
        </div>
    </div> --}}

    <section id="hero">
        <div class="hero-container">
            <h1>Trans Talia</h1>
            <h2>Menyediakan jasa yang bergerak di bidang transportasi darat</h2>
            {{-- <h2>We are team of talanted designers making websites with Bootstrap</h2> --}}
            <a href="#about" class="btn-get-started text-light">Lihat Jadwal</a>
        </div>
    </section>

    <section id="facts" class="bgc-primary">
        <div class="container wow fadeIn">
            <div class="section-header">
                <h3 class="section-title">Menyediakan Layanan</h3>
                <p class="section-description">&nbsp;</p>
            </div>
            <div class="row counters px-2">
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-bus-alt fs-1 my-4 text-primary"></i>
                    <h4 class="f-poppins text-dark">Trip Wisata</h4>
                    <p>kegiatan perjalanan yang dilakukan dengan tujuan untuk berlibur, mengunjungi tempat-tempat menarik, dan menikmati pengalaman-pengalaman baru.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-bus fs-1 my-4 text-primary"></i>
                    <h4 class="f-poppins text-dark">Pariwisata</h4>
                    <p>Kegiatan rekreasi yang dilakukan oleh wisatawan di luar lingkungan tempat tinggal mereka. Mulai dari pariwisata alam, sejarah, budaya, hingga pariwisata olahraga.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fa fa-bus-alt fs-1 my-4 text-primary"></i>
                    <h4 class="f-poppins text-dark">Trip Ziarah</h4>
                    <p>Kegiatan perjalanan yang dilakukan oleh umat agama ke tempat-tempat yang dianggap suci atau memiliki nilai religius yang penting dalam kepercayaan mereka.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-book-open fs-1 my-4 text-primary"></i>
                    <h4 class="f-poppins text-dark">Study Tour</h4>
                    <p>Kegiatan perjalanan yang diorganisir oleh institusi pendidikan, seperti sekolah atau universitas, dengan tujuan memberikan pengalaman belajar di luar kelas.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-industry fs-1 my-4 text-primary"></i>
                    <h4 class="f-poppins text-dark">Kunjungan Industri</h4>
                    <p>Kegiatan perjalanan yang diorganisir untuk peserta untuk mengunjungi perusahaan atau lokasi lain yang berkaitan dengan produksi atau industri tertentu.</p>
                </div>
                <div class="col-lg-4 col-12 text-center">
                    <i class="fas fa-plus-circle fs-1 my-4 text-primary"></i>
                    <h4 class="f-poppins text-dark">Tambahan Fasilitas</h4>
                    <p>Trans Talia juga menyediakan layanan untuk penambahan fasilitas pada bus yang disewa sehingga penumpang bisa dengan nyaman melakukan perjalanan.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="facts" class="bgc-secondary">
        <div class="container wow fadeIn">
            <div class="section-header">
                <h3 class="section-title">Informasi Kami</h3>
                {{-- <p class="section-description">&nbsp;</p> --}}
            </div>
            <div class="row counters f-poppins mt-5">
                <div class="col-lg-4 col-12 text-center">
                    <span data-toggle="counter-up" class="text-primary">11<sup>+</sup></span>
                    <p>Armada Bus</p>
                </div>
                <div class="col-lg-4 col-6 text-center">
                    <span data-toggle="counter-up" class="text-primary">590<sup>+</sup></span>
                    <p>Perjalanan</p>
                </div>
                <div class="col-lg-4 col-6 text-center">
                    <span data-toggle="counter-up" class="text-primary">25<sup>+</sup></span>
                    <p>Karyawan</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function ($) {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('#header').addClass('header-fixed');
                } else {
                    $('#header').removeClass('header-fixed');
                }
            });
        });
    </script>

@endsection