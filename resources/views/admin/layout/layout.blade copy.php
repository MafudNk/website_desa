<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Desa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Open+Sans:300,400,600,700"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
                urls: ['/assets/css/fonts.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/azzara.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link rel="stylesheet" href="/assets/css/demo.css"> --}}
</head>

<body>
    <div class="wrapper">
        <!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
        <div class="main-header" data-background-color="light-blue">
            <!-- Logo Header -->
            <div class="logo-header">
                <a href="/dashboard" class="logo">
                    <img src="{{ asset('img/logo sby.png') }}" width="50" height="50" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
        </div>
        <!-- Sidebar -->
        <div class="sidebar">

            <div class="sidebar-wrapper scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="/home" target="_blank">
                                <i class="fas fa-laptop"></i>
                                <p>Website</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Database Master</h4>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Data Desa</p>

                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/user">
                                            <span class="sub-item">Ubah Detail Pengguna</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#bookmsk">
                                <i class="fas fa-user-cog"></i>
                                <p>Market & E-Commerce</p>
                            </a>
                            <div class="collapse" id="bookmsk">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/booking_masuk">
                                            <span class="sub-item">Add Booking Masuk</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#contmsk">
                                <i class="fas fa-store"></i>
                                <p>Layanan</p>
                            </a>
                            <div class="collapse" id="contmsk">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/cont_masuk">
                                            <span class="sub-item">Add Layanan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#book_keluar">
                                <i class="fas fa-star"></i>
                                <p>Rekomendasi</p>
                            </a>
                            <div class="collapse" id="book_keluar">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/booking_keluar">
                                            <span class="sub-item">Add Rekomendasi</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#cont_keluar">
                                <i class="fab fa-youtube-square"></i>
                                <p>Foto & Video</p>
                            </a>
                            <div class="collapse" id="cont_keluar">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/cont_keluar">
                                            <span class="sub-item">Add Foto & Video</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#cont_keluar">
                                <i class="fas fa-book"></i>
                                <p>Kontak</p>
                            </a>
                            <div class="collapse" id="cont_keluar">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/cont_keluar">
                                            <span class="sub-item">Add Kontak</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Laporan</h4>
                        </li>

                        <li class="nav-item">
                            <a data-toggle="collapse" href="#laporan">
                                <i class="fas fa-file-alt"></i>
                                <p>Cetak Laporan</p>
                            </a>

                            <div class="collapse" id="laporan">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/lap_user">
                                            <span class="sub-item">Laporan Data User</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/lap_book_masuk">
                                            <span class="sub-item">Laporan Booking Masuk</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/lap_cont_masuk">
                                            <span class="sub-item">Laporan Container Masuk</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/lap_book_keluar">
                                            <span class="sub-item">Laporan Booking Keluar</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/lap_cont_keluar">
                                            <span class="sub-item">Laporan Container Keluar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </li>

                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Logout</h4>
                        </li>

                        <li class="nav-item">
                            <a href="/logout">
                                <i class="fas fa-lock"></i>
                                Keluar Akun
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        @yield('content')

        {{-- <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Topbar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeMainHeaderColor" data-color="blue"></button>
                            <button type="button" class="selected changeMainHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="green"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeMainHeaderColor" data-color="red"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div>
        </div> --}}
        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Bootstrap Toggle -->
    <script src="/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="/assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Azzara JS -->
    <script src="/assets/js/ready.min.js"></script>
    <!-- Azzara DEMO methods, don't include it in your project! -->
    <script src="/assets/js/setting-demo.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-row').DataTable({});

        });
    </script>
</body>

</html>


