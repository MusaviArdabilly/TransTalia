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

  <section class="min-vh-100 bg-public-1">
    <div class="container py-3 py-md-5">
      <div class="row mt-3 mt-md-5">
        <div class="col-12 col-md-5">
          <div class="row mb-4">
            <div class="col-4 text-center">
              <div class="me-auto">
                <i class="fs-40 mb-3 ascent-public-2 fa-regular fa-calendar-days"></i>
                <h1 class="fs-16 mb-1">Pengalaman (Tahun)</h1>
                <h1 class="fs-20 fw-600">8</h1>
              </div>
            </div>
            <div class="col-4 text-center">
              <i class="fs-40 mb-3 ascent-public-2 fa-regular fa-face-smile"></i>
              <h1 class="fs-16 mb-1">Pelanggan Terupaskan</h1>
              <h1 class="fs-20 fw-600">5000</h1>
            </div>
            <div class="col-4 ms-auto text-center">
              <i class="fs-40 mb-3 ascent-public-2 fa-solid fa-globe"></i>
              <h1 class="fs-16 mb-1">Jangkauan Destinasi</h1>
              <h1 class="fs-20 fw-600">Jawa - Bali</h1>
            </div>
          </div>
          <div class="row">
            <div class="col">
              Temukan pengalaman transportasi darat yang menarik bersama Trans Talia. 
              Sejak didirikan pada tahun 2008, kami telah menjadi simbol keunggulan dalam industri ini. 
              Apa yang dimulai dengan satu bus berukuran medium kini berkembang menjadi armada 12 kendaraan yang dipelihara dengan cermat. 
              Armada kami terdiri dari bus besar yang luas dan bus medium yang lincah, menjamin kenyamanan dan kemudahan dalam setiap perjalanan. <br>
              Dengan bangga bermarkas di Mojoagung, Jombang, Jawa Timur, Trans Talia adalah mitra terpercaya Anda dalam pengalaman perjalanan yang aman 
              dan dapat diandalkan.
            </div>
          </div>
        </div>
        <div class="col-12 col-md-7">
          <div class="d-flex align-items-center justify-content-center justify-content-md-end">
            <div class="banner-landing-page-container-left">
              <img class="banner-landing-page-left" src="{{ asset('assets/banner/mercyjb5.jpeg') }}" alt="">
            </div>
            <div class="banner-landing-page-container-mid">
              <img class="banner-landing-page-mid" src="{{ asset('assets/banner/mercyjb5.jpeg') }}" alt="">
            </div>
            <div class="banner-landing-page-container-right">
              <img class="banner-landing-page-right" src="{{ asset('assets/banner/mercyjb5.jpeg') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- <section id="menyediakan-layanan" class="bg-light2">
      <div class="container wow fadeIn py-5">
          <h3 class="text-center text-body fw-bold py-5">MENYEDIAKAN LAYANAN</h3>
          <div class="row counters px-2">
              <div class="col-lg-4 col-12 text-center">
                  <i class="fas fa-bus-alt fs-1 my-4 text-primary"></i>
                  <h4 class="text-dark">Trip Wisata</h4>
                  <p>kegiatan yang dilakukan dengan tujuan untuk berlibur, mengunjungi tempat-tempat menarik, dan menikmati pengalaman-pengalaman baru.</p>
              </div>
              <div class="col-lg-4 col-12 text-center">
                  <i class="fas fa-bus fs-1 my-4 text-primary"></i>
                  <h4 class="text-dark">Pariwisata</h4>
                  <p>Kegiatan yang dilakukan oleh wisatawan di luar lingkungan tempat tinggal mereka. Mulai dari pariwisata alam, sejarah, budaya, hingga pariwisata olahraga.</p>
              </div>
              <div class="col-lg-4 col-12 text-center">
                  <i class="fa fa-bus-alt fs-1 my-4 text-primary"></i>
                  <h4 class="text-dark">Trip Ziarah</h4>
                  <p>Kegiatan yang dilakukan oleh umat agama ke tempat-tempat yang dianggap suci atau memiliki nilai religius yang penting dalam kepercayaan mereka.</p>
              </div>
              <div class="col-lg-4 col-12 text-center">
                  <i class="fas fa-book-open fs-1 my-4 text-primary"></i>
                  <h4 class="text-dark">Study Tour</h4>
                  <p>Kegiatan yang diorganisir oleh institusi pendidikan, seperti sekolah atau universitas, dengan tujuan memberikan pengalaman belajar di luar kelas.</p>
              </div>
              <div class="col-lg-4 col-12 text-center">
                  <i class="fas fa-industry fs-1 my-4 text-primary"></i>
                  <h4 class="text-dark">Kunjungan Industri</h4>
                  <p>Kegiatan yang diorganisir untuk peserta untuk mengunjungi perusahaan atau lokasi lain yang berkaitan dengan produksi atau industri tertentu.</p>
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
                  <p class="fs-6">Armada Bus</p>
              </div>
              <div class="col-lg-4 col-6 text-center">
                  <span data-toggle="counter-up" class="text-primary fs-1">590<sup>+</sup></span>
                  <p class="fs-6">Perjalanan</p>
              </div>
              <div class="col-lg-4 col-6 text-center">
                  <span data-toggle="counter-up" class="text-primary fs-1">25<sup>+</sup></span>
                  <p class="fs-6">Karyawan</p>
              </div>
          </div>
      </div>
  </section> --}}

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