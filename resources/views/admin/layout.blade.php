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
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('vendor/sbadmin/css/sb-admin-2.min.css') }}"" rel="stylesheet">

    <style>
        .dropshadow {
            filter: drop-shadow(1px 1px 1px rgb(0 0 0 / 0.7));
        }
        .dropshadowlight {
            filter: drop-shadow(1px 1px 1px rgb(0 0 0 / 0.4));
        }
        .minvh100-233 {
            min-height: calc(100vh - 233px);
        }
        #calendar-container {
            width: 100%;
            min-height: 550px;
        }
        #calendar {
            width: 100%;
            min-height: 550px;
        }
        .fc .fc-button{
            font-size: 0.75rem !important;
            font-weight: 700 !important;
        }
        .fc .fc-toolbar-title {
            font-size: 1em !important;
            font-weight: 700 !important;
            color: #007bff;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion d-none d-sm-block" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <svg viewBox="0 0 236.08 204.09" style="height: 2rem" class="dropshadow">
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
                </div>
                <div class="sidebar-brand-text mx-3 dropshadow">Trans Talia</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading dropshadowlight">
                Master
            </div>

            <!-- Nav Item - Bus -->
            <li class="nav-item" id="armadabus">
                <a class="nav-link" href="/admin/armada_bus">
                    <i class="fas fa-fw fa-bus"></i>
                    <span>Armada Bus</span></a>
            </li>

            <!-- Nav Item - Kode Perawatan -->
            <li class="nav-item" id="kodeperawatan">
                <a class="nav-link" href="/admin/kode_perawatan">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Kode Perawatan</span></a>
            </li>

            <!-- Nav Item - Pegawai -->
            <li class="nav-item" id="pegawai">
                <a class="nav-link" href="/admin/pegawai">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Pegawai</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading dropshadowlight">
                Data
            </div>

            <!-- Nav Item - Jadwal -->
            <li class="nav-item" id="jadwal">
                <a class="nav-link" href="/admin/jadwal">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jadwal</span></a>
            </li>

            <!-- Nav Item - Reservasi -->
            <li class="nav-item" id="reservasi">
                <a class="nav-link" href="/admin/reservasi">
                    <i class="far fa-fw fa-calendar"></i>
                    <span>Reservasi</span></a>
            </li>

            <!-- Nav Item - Transaksi -->
            <li class="nav-item" id="transaksi">
                <a class="nav-link" href="/admin/transaksi">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Nav Item - Perawatan Armada -->
            <li class="nav-item" id="perawatanarmada">
                <a class="nav-link" href="/admin/perawatan_armada">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Perawatan Armada</span></a>
            </li>

            <!-- Nav Item - Pembaruan Armada -->
            <li class="nav-item" id="pembaruanarmada">
                <a class="nav-link" href="/admin/pembaruan_armada">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Pembaruan Armada</span></a>
            </li>

            <!-- Nav Item - Performa Pegawai -->
            <li class="nav-item" id="performapegawai">
                <a class="nav-link" href="/admin/performa_pegawai">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Performa Pegawai</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="assets/logo/Logo.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Trans Talia &copy; {{ now()->year }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/sbadmin/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('vendor/sbadmin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('vendor/sbadmin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('vendor/sbadmin/js/demo/chart-pie-demo.js') }}"></script>
    
    <script>
        // Get the button and the element to add the class to
        const addClassButton = $("#sidebarToggleTop");
        const elementToAddClass = $("#accordionSidebar");

        // Add an event listener to the button
        addClassButton.click(function() {
        // Call the addClass() function to add the "newClass" class to the element
        elementToAddClass.removeClass("d-none");
        });
    </script>
</body>

</html>