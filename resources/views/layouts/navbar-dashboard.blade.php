<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
       {{-- activated when tunneling with ngrok on --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    {{-- end active --}}

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
         <link href="{{ asset('assets/css/avatar.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        label{margin-left: 20px;}
        #datepicker{width:45%;}
        #datepicker > span:hover{cursor: pointer;}
        #datepicker2{width:45%;}
        #datepicker2 > span:hover{cursor: pointer;}
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <span class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-text mx-3">SiTukang</div>
            </span>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @if(Request::is('tukang/profile')) active  @endif">
                <a class="nav-link" href="{{ route('tukang.profile') }}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Atur Profil</span></a>
            </li>
            <li class="nav-item @if(Request::is('tukang/pengalaman')) active @elseif(Request::is('tukang/pengalaman/tambah')) active @endif">
                <a class="nav-link" href="{{ route('tukang.pengalaman') }}">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Pengalaman</span></a>
            </li>
             <li class="nav-item @if(Request::is('tukang/penyewaan/konfirmasi')) active @endif">
                <a class="nav-link" href="{{ route('tukang.penyewaan') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Penyewaan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Keluar</span></a>
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


                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                @php
                                    $notification = App\Models\Notification::where('tukangs_id', Auth::user()->id)->join('pelanggans', 'notification.pelanggans_id', '=', 'pelanggans.id')->select('pelanggans.nama', 'notification.created_at')->get();
                                @endphp
                                <span class="@if($notification->count()!=0)badge badge-danger badge-counter @endif" id="notif">{{ $notification->count() }}</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" style="max-height: 350px; overflow-y: auto;">
                                <h6 class="dropdown-header">
                                    Pemberitahuan
                                </h6>
                                @foreach ($notification as $itemNotif )
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('tukang.penyewaan') }}">
                                    <div>
                                        <div class="small text-gray-500">{{ $itemNotif->created_at }}</div>
                                        <span><strong>{{ $itemNotif->nama }}</strong> mengajukan sewa kepada anda, tanggapi pengajuan sewa tersebut!</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nama }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ url('storage/tukang/foto-profil/'.Auth::user()->foto) }}">
                            </a>
                        </li>

                    </ul>

                </nav>

                @yield('content')


                 </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>SiTukang. 2023</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk keluar sistem?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" untuk menghapus sesi masuk pada saat ini, dan keluar sistem</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="{{ route('tukang.logout') }}">Keluar</a>
                </div>
            </div>
        </div>
    </div>

     @include('sweetalert::alert')
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function(){
       Pusher.logToConsole = true;

    const pusher = new Pusher('3176919d7b7f92b439a3', {
      cluster: 'ap1'
    });
    const channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    JSON.stringify(data);
    if(data.tukangs_id === "{{ Auth::user()->id }}"){
             const notifElement = document.getElementById('notif');
             let notifCount = parseInt(notifElement.innerHTML);
            if(notifCount){
                notifCount++;
                notifElement.innerHTML = notifCount;
            } else{
                notifElement.innerHTML = notifCount;
            }
    }
    });

    });
    </script>
    @yield('js')

    <!-- Page level plugins -->
    {{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> --}}

</body>
</html>
