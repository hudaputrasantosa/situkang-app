<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   {{-- activated when tunneling with ngrok on --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    {{-- end active --}}
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pelanggan | @yield('title')</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> --}}
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">


        @vite(['resources/js/app.js'])
      <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/avatar.css') }}" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('homepage') }}">SiTukang | Pelanggan</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <div class="navbar-nav lg:block hidden ms-auto me-0 me-md-3 my-2 my-md-0">
            <a class="nav-link flex items-center">
                <img class="img-profile rounded-circle px-2" width="50px"
                    src="@if (Auth::user()->foto) {{ url('storage/pelanggan/foto-profil/', Auth::user()->foto) }}
               @else https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg @endif">
               {{ Auth::user()->nama }}</a>
        </div>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"></div>
                        {{-- <a class="nav-link @if (Request::is('/user/dashboard')) active @endif" href="#">
                            <div class="sb-nav-link-icon active"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a> --}}

                        <a class="nav-link @if (Request::is('user/profile', Auth::user()->id)) active @endif"
                            href="{{ route('pelanggan.profil') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            Profile
                        </a>

                        <a class="nav-link @if (Request::is('user/sewa/riwayat')) active @endif"
                            href="{{ route('pelanggan.riwayat') }}">
                            <div class="sb-nav-link-icon"><i class="fa fa-history"></i></div>
                            Riwayat Sewa
                        </a>

                        <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            <span>Keluar</span></button>
                        <div class="px-3 py-3">

                            <a href="{{ route('homepage') }}" class="nav btn btn-primary">Ke Beranda</a>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>


                @yield('content')


            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SITUKANG.ID 2024</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>


    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar sistem?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Pilih "Keluar" untuk menghapus sesi masuk pada saat ini, dan keluar sistem</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary bg-gray-500" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="{{ route('auth.logout') }}">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/jquery-3.7.1.js') }}"></script>
    {{-- <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    @yield('js')
</body>

</html>
