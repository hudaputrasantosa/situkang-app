<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | Pelanggan</title>
    <link href="{{ asset("assets/css/style.min.css") }}" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="dashboard.html">
                        <b class="logo-icon">
                            {{-- <img src="plugins/images/logo-icon.png" alt="homepage" /> --}}
                        </b>
                        <span class="logo-text">
                            {{-- <img src="plugins/images/logo-text.png" alt="homepage" /> --}}
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">{{ Auth::user()->nama }}</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('/user/dashboard')) active @endif" href="dashboard.html"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('user/profile', Auth::user()->id)) active @endif" href="{{ route('pelanggan.profil') }}"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link @if(Request::is('/sewa/riwayat')) active @endif" href="{{ route('pelanggan.riwayat') }}"
                                aria-expanded="false">
                                <i class="fa fa-history" aria-hidden="true"></i>
                                <span class="hide-menu">Riwayat Sewa</span>
                            </a>
                        </li>
                                <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('auth.logout') }}"
                                aria-expanded="false">
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                <span class="hide-menu">Keluar</span>
                            </a>
                        </li>
                        <li class="text-center pt-12">
                           <br>
                            <a href="{{ route('homepage') }}" class="btn btn-danger pt-20 text-white">
                                 <i class="fa fa-home" aria-hidden="true"></i>
                               <span class="hide-menu">Kembali ke Homepage</span> 
                            </a>
                        </li>
                        
                    </ul>

                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            @yield('content')
            <footer class="footer text-center"> 2023 © Situkang App </footer>
        </div>
    </div>

    <script src="{{ asset("assets/jquery-3.7.1.js") }}"></script>
    <script src="{{ asset("assets/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
      <script src="{{ asset("assets/js/app-style-switcher.js") }}"></script>
    <script src="{{ asset("assets/js/waves.js") }}"></script>
    <script src="{{ asset("assets/js/sidebarmenu.js") }}"></script>
    <script src="{{ asset("assets/js/custom.js") }}"></script>

</body>

</html>