<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('assets/logo/Logo1.svg') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/guest.css') }}" rel="stylesheet" type="text/css">

    <style>
        .dropshadow {
            filter: drop-shadow(0px 0px 1px #38333380);
        }
        .top-shadow {
            box-shadow: 0 -0.5rem 1rem rgba(var(--bs-body-color-rgb), 0.15) !important;
        }
        .minvh100-157{
            min-height: calc(100vh - 157px);
        }
        .minvh100-xx{
            min-height: calc(100vh - 185px);
        }
        .innershadow {
            box-shadow: inset 0 0 5px #f8a100;
        }
        .object-fit-center{
            object-fit: cover;
            object-position: center;
        }
        .mt-n2 {
            margin-top: -2.25rem !important;
        }
        a {
            text-decoration: none;
        }
        .f-poppins {
            font-family: "Poppins", sans-serif;
        }
        .mt-5rem{
            margin-top: 5rem;
        }
        #calendar-container {
            width: 100%;
            height: 650px;
        }
        #calendar {
            width: 100%;
            height: 650px;
        }
        .navbar-toggler-icon {
            color: #f8f9fa;
        }
        .mt-nav{
            margin-top: 104px;
        }
    </style>
</head>

<body class="f-poppins">
    
    <!-- Vendor JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Navbar  --}}
    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <svg viewBox="0 0 236.08 204.09" style="height: 2rem" class="me-2 dropshadow">
                    <defs>
                        <style>
                            .cls-1{fill:#fff;stroke:#231f20;stroke-miterlimit:10;opacity:0.6;}.cls-2{fill:#ed1c24;}.cls-3{fill:#007cc6;}
                        </style>
                    </defs>
                    <path class="cls-1" d="M90.61,340.13" transform="translate(-7.66 -340.13)"/>
                    <polygon class="cls-2" points="215.96 0 215.96 27.27 167.1 27.27 167.1 119.32 135.28 119.32 135.28 26.14 81.87 26.14 81.87 0 215.96 0"/>
                    <path class="cls-3" d="M198.52,428.73l45.22-.41-18.41,36.14L182,464Z" transform="translate(-7.66 -340.13)"/>
                    <path class="cls-3" d="M178.2,471.15l43.85.28-18.28,34.7-42.06.27Z" transform="translate(-7.66 -340.13)"/>
                    <polygon class="cls-3" points="111.21 173.88 191.92 173.88 174.3 204.09 126.84 204.09 111.21 173.88"/>
                    <path class="cls-3" d="M118.6,428.73l-45.22-.41,18.41,36.14,43.37-.42Z" transform="translate(-7.66 -340.13)"/>
                    <path class="cls-3" d="M138.92,471.15l-43.85.28,18.28,34.7,42.06.27Z" transform="translate(-7.66 -340.13)"/>
                    <rect class="cls-3" y="120.49" width="65.07" height="3.73"/>
                    <rect class="cls-3" x="21.16" y="162.09" width="65.07" height="3.73"/>
                    <rect class="cls-3" x="42.25" y="199.85" width="65.07" height="3.73"/>
                </svg>
                <svg viewBox="0 0 777.96 146.64" style="height: 1.25rem" class="dropshadow">
                    <defs>
                        <style>.cls-1{fill:#e47816;}.cls-2{fill:#007cc6;}.cls-3{fill:#ed1c24;}</style>
                    </defs>
                    <path class="cls-1" d="M323.33,410.51H284.05V399.16h95.61v11.35H340.19v92H323.33Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M375.67,451.45c0-8.74-.19-16.26-.77-23.16h14.75l.58,14.57H391c4.22-10,14.37-16.25,25.68-16.25a22.44,22.44,0,0,1,4.79.46v12.72a32.1,32.1,0,0,0-5.75-.46c-11.88,0-20.31,7.21-22.61,17.33a31,31,0,0,0-.76,6.29v39.56H375.67Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M485.41,502.51l-1.34-9.36h-.58c-5.17,5.83-15.13,11-28.35,11-18.78,0-28.36-10.58-28.36-21.31,0-17.94,19.93-27.75,55.75-27.6v-1.53c0-6.14-2.1-17.18-21.07-17.18a55,55,0,0,0-24.14,5.52l-3.83-8.89c7.66-4,18.77-6.59,30.46-6.59,28.35,0,35.25,15.48,35.25,30.36v27.75a84.07,84.07,0,0,0,1.53,17.79Zm-2.49-37.88c-18.4-.3-39.28,2.3-39.28,16.72,0,8.74,7.28,12.88,15.9,12.88,12.07,0,19.74-6.14,22.42-12.42a11.73,11.73,0,0,0,1-4.3Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M521,448.38c0-7.67-.19-13.95-.76-20.09h14.94l1,12.27h.38c4.6-7.05,15.33-13.95,30.65-13.95,12.84,0,32.77,6.13,32.77,31.58v44.32H583.06V459.73c0-12-5.56-21.93-21.46-21.93-11.11,0-19.74,6.29-22.61,13.8a16,16,0,0,0-1.15,6.29v44.62H521Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M618.78,488.71A52.46,52.46,0,0,0,641,494.07c12.26,0,18-4.9,18-11,0-6.44-4.79-10-17.25-13.64-16.66-4.76-24.52-12.12-24.52-21,0-12,12.07-21.77,32-21.77,9.38,0,17.62,2.14,22.79,4.6L667.83,441a42.87,42.87,0,0,0-19-4.29c-10,0-15.52,4.6-15.52,10.12,0,6.13,5.56,8.89,17.63,12.57,16.09,4.91,24.33,11.35,24.33,22.39,0,13-12.64,22.23-34.68,22.23-10.15,0-19.54-2-26-5.06Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M774.35,412.19H735.08V400.84h95.6v11.35H791.21v92H774.35Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M876.6,504.19l-1.34-9.35h-.57c-5.18,5.83-15.14,11-28.36,11-18.78,0-28.35-10.58-28.35-21.32,0-17.94,19.92-27.75,55.75-27.6v-1.53c0-6.13-2.11-17.17-21.08-17.17a54.94,54.94,0,0,0-24.14,5.52l-3.83-8.9c7.66-4,18.78-6.59,30.46-6.59,28.36,0,35.26,15.49,35.26,30.36V486.4a84,84,0,0,0,1.53,17.79Zm-2.49-37.87c-18.39-.31-39.28,2.3-39.28,16.71,0,8.74,7.29,12.88,15.91,12.88,12.07,0,19.73-6.13,22.41-12.42a11.48,11.48,0,0,0,1-4.29Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M912.31,395.32h16.86V504.19H912.31Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M970.38,409.12c.19,4.6-4,8.28-10.73,8.28-5.94,0-10.16-3.68-10.16-8.28s4.41-8.43,10.54-8.43C966.35,400.69,970.38,404.37,970.38,409.12ZM951.6,504.19V430h16.86v74.21Z" transform="translate(-284.05 -395.32)"/>
                    <path class="cls-1" d="M1042.14,504.19l-1.34-9.35h-.57c-5.17,5.83-15.14,11-28.36,11-18.77,0-28.35-10.58-28.35-21.32,0-17.94,19.92-27.75,55.75-27.6v-1.53c0-6.13-2.11-17.17-21.07-17.17a54.88,54.88,0,0,0-24.14,5.52l-3.84-8.9c7.67-4,18.78-6.59,30.47-6.59,28.35,0,35.25,15.49,35.25,30.36V486.4a84,84,0,0,0,1.53,17.79Zm-2.49-37.87c-18.39-.31-39.27,2.3-39.27,16.71,0,8.74,7.28,12.88,15.9,12.88,12.07,0,19.73-6.13,22.42-12.42a11.66,11.66,0,0,0,1-4.29Z" transform="translate(-284.05 -395.32)"/>
                    <rect class="cls-2" y="126.58" width="777.96" height="5.6"/>
                    <rect class="cls-3" y="141.03" width="777.96" height="5.6"/>
                </svg>
            </a>
            <div class="vr me-2 d-none d-lg-flex text-dark"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse fw-semibold" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary text-center" id="beranda" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary text-center" id="profil" href="/profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary text-center" id="jadwal" href="/jadwal">Jadwal</a>
                    </li>
                </ul>
                <hr class="d-lg-none">
                <div class="d-flex justify-content-around">
                    <a href="/daftar" class="d-flex text-decoration-none me-3">Daftar</a>
                    <a href="/masuk" class="d-flex text-decoration-none mb-2 mb-lg-0">Masuk</a>
                </div>
            </div>
        </div>
    </nav> --}}

    <header id="header" class="py-3">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="#hero">
                        <svg viewBox="0 0 236.08 204.09" style="height: 2.88rem" class="me-2 dropshadow">
                            <defs>
                                <style>
                                    .cls-1{fill:#fff;stroke:#231f20;stroke-miterlimit:10;opacity:0.6;}.cls-2{fill:#ed1c24;}.cls-3{fill:#007cc6;}
                                </style>
                            </defs>
                            <path class="cls-1" d="M90.61,340.13" transform="translate(-7.66 -340.13)"/>
                            <polygon class="cls-2" points="215.96 0 215.96 27.27 167.1 27.27 167.1 119.32 135.28 119.32 135.28 26.14 81.87 26.14 81.87 0 215.96 0"/>
                            <path class="cls-3" d="M198.52,428.73l45.22-.41-18.41,36.14L182,464Z" transform="translate(-7.66 -340.13)"/>
                            <path class="cls-3" d="M178.2,471.15l43.85.28-18.28,34.7-42.06.27Z" transform="translate(-7.66 -340.13)"/>
                            <polygon class="cls-3" points="111.21 173.88 191.92 173.88 174.3 204.09 126.84 204.09 111.21 173.88"/>
                            <path class="cls-3" d="M118.6,428.73l-45.22-.41,18.41,36.14,43.37-.42Z" transform="translate(-7.66 -340.13)"/>
                            <path class="cls-3" d="M138.92,471.15l-43.85.28,18.28,34.7,42.06.27Z" transform="translate(-7.66 -340.13)"/>
                            <rect class="cls-3" y="120.49" width="65.07" height="3.73"/>
                            <rect class="cls-3" x="21.16" y="162.09" width="65.07" height="3.73"/>
                            <rect class="cls-3" x="42.25" y="199.85" width="65.07" height="3.73"/>
                        </svg>
                        <svg viewBox="0 0 777.96 146.64" style="height: 1.8rem" class="dropshadow d-none d-sm-inline">
                            <defs>
                                <style>.cls-1{fill:#e47816;}.cls-2{fill:#007cc6;}.cls-3{fill:#ed1c24;}</style>
                            </defs>
                            <path class="cls-1" d="M323.33,410.51H284.05V399.16h95.61v11.35H340.19v92H323.33Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M375.67,451.45c0-8.74-.19-16.26-.77-23.16h14.75l.58,14.57H391c4.22-10,14.37-16.25,25.68-16.25a22.44,22.44,0,0,1,4.79.46v12.72a32.1,32.1,0,0,0-5.75-.46c-11.88,0-20.31,7.21-22.61,17.33a31,31,0,0,0-.76,6.29v39.56H375.67Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M485.41,502.51l-1.34-9.36h-.58c-5.17,5.83-15.13,11-28.35,11-18.78,0-28.36-10.58-28.36-21.31,0-17.94,19.93-27.75,55.75-27.6v-1.53c0-6.14-2.1-17.18-21.07-17.18a55,55,0,0,0-24.14,5.52l-3.83-8.89c7.66-4,18.77-6.59,30.46-6.59,28.35,0,35.25,15.48,35.25,30.36v27.75a84.07,84.07,0,0,0,1.53,17.79Zm-2.49-37.88c-18.4-.3-39.28,2.3-39.28,16.72,0,8.74,7.28,12.88,15.9,12.88,12.07,0,19.74-6.14,22.42-12.42a11.73,11.73,0,0,0,1-4.3Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M521,448.38c0-7.67-.19-13.95-.76-20.09h14.94l1,12.27h.38c4.6-7.05,15.33-13.95,30.65-13.95,12.84,0,32.77,6.13,32.77,31.58v44.32H583.06V459.73c0-12-5.56-21.93-21.46-21.93-11.11,0-19.74,6.29-22.61,13.8a16,16,0,0,0-1.15,6.29v44.62H521Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M618.78,488.71A52.46,52.46,0,0,0,641,494.07c12.26,0,18-4.9,18-11,0-6.44-4.79-10-17.25-13.64-16.66-4.76-24.52-12.12-24.52-21,0-12,12.07-21.77,32-21.77,9.38,0,17.62,2.14,22.79,4.6L667.83,441a42.87,42.87,0,0,0-19-4.29c-10,0-15.52,4.6-15.52,10.12,0,6.13,5.56,8.89,17.63,12.57,16.09,4.91,24.33,11.35,24.33,22.39,0,13-12.64,22.23-34.68,22.23-10.15,0-19.54-2-26-5.06Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M774.35,412.19H735.08V400.84h95.6v11.35H791.21v92H774.35Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M876.6,504.19l-1.34-9.35h-.57c-5.18,5.83-15.14,11-28.36,11-18.78,0-28.35-10.58-28.35-21.32,0-17.94,19.92-27.75,55.75-27.6v-1.53c0-6.13-2.11-17.17-21.08-17.17a54.94,54.94,0,0,0-24.14,5.52l-3.83-8.9c7.66-4,18.78-6.59,30.46-6.59,28.36,0,35.26,15.49,35.26,30.36V486.4a84,84,0,0,0,1.53,17.79Zm-2.49-37.87c-18.39-.31-39.28,2.3-39.28,16.71,0,8.74,7.29,12.88,15.91,12.88,12.07,0,19.73-6.13,22.41-12.42a11.48,11.48,0,0,0,1-4.29Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M912.31,395.32h16.86V504.19H912.31Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M970.38,409.12c.19,4.6-4,8.28-10.73,8.28-5.94,0-10.16-3.68-10.16-8.28s4.41-8.43,10.54-8.43C966.35,400.69,970.38,404.37,970.38,409.12ZM951.6,504.19V430h16.86v74.21Z" transform="translate(-284.05 -395.32)"/>
                            <path class="cls-1" d="M1042.14,504.19l-1.34-9.35h-.57c-5.17,5.83-15.14,11-28.36,11-18.77,0-28.35-10.58-28.35-21.32,0-17.94,19.92-27.75,55.75-27.6v-1.53c0-6.13-2.11-17.17-21.07-17.17a54.88,54.88,0,0,0-24.14,5.52l-3.84-8.9c7.67-4,18.78-6.59,30.47-6.59,28.35,0,35.25,15.49,35.25,30.36V486.4a84,84,0,0,0,1.53,17.79Zm-2.49-37.87c-18.39-.31-39.27,2.3-39.27,16.71,0,8.74,7.28,12.88,15.9,12.88,12.07,0,19.73-6.13,22.42-12.42a11.66,11.66,0,0,0,1-4.29Z" transform="translate(-284.05 -395.32)"/>
                            <rect class="cls-2" y="126.58" width="777.96" height="5.6"/>
                            <rect class="cls-3" y="141.03" width="777.96" height="5.6"/>
                        </svg>
                    </a>
                    <button class="navbar-toggler border-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars text-light p-1"></i>
                    </button>
                    <div class="collapse navbar-collapse f-poppins fs-6" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 mt-3 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-light text-center dropshadow" id="beranda" aria-current="page" href="/">BERANDA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light text-center dropshadow" id="profil" href="/profil">PROFIL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light text-center dropshadow" id="jadwal" href="/jadwal">JADWAL</a>
                            </li>
                        </ul>
                        <div class="vr mx-3 d-none d-lg-flex text-light"></div>
                        <hr class="d-lg-none">
                        <div class="d-flex justify-content-around ms-md-1">
                            {{-- <a href="/daftar" class="d-flex text-light text-decoration-none me-2 dropshadow">DAFTAR</a> --}}
                            <a href="/masuk" class="d-flex text-light text-decoration-none ms-2 dropshadow">MASUK</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')
    
    <!-- Footer -->
    {{-- <div class="container-fluid top-shadow">
        <footer class="">
          <ul class="nav justify-content-center border-bottom py-2 fw-semibold">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-primary text-opacity-75">Beranda</a></li>
            <li class="nav-item"><a href="/profil" class="nav-link px-2 text-primary text-opacity-75">Profil</a></li>
            <li class="nav-item"><a href="/jadwal" class="nav-link px-2 text-primary text-opacity-75">Jadwal</a></li>
            <li class="nav-item"><a href="/masuk" class="nav-link px-2 text-primary text-opacity-75">Masuk</a></li>
            <li class="nav-item"><a href="/daftar" class="nav-link px-2 text-primary text-opacity-75">Daftar</a></li>
          </ul>
          <span class="d-flex justify-content-center my-2 text-muted">Trans Talia &copy; {{ now()->year }}</span>
        </footer>
    </div> --}}

    <footer id="footer">
        <div class="container">
          <div class="copyright">
            &copy; Trans Talia {{ now()->year }}. All Rights Reserved
          </div>
        </div>
      </footer>
      
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
</body>

</html>