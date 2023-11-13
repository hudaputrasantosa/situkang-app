<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404 Halaman tidak ditemukan</title>
    <link href="{{ asset("assets/css/style.min.css") }}" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="error-box">
            <div class="error-body text-center">
                <h1 class="error-title text-danger">404</h1>
                <h3 class="text-uppercase font-bold error-subtitle">HALAMAN TIDAK DITEMUKAN !</h3>
                <p class="text-muted mt-4 mb-4">Ada sesuatu yang salah pada url kamu, sehingga tidak ditemukan</p>
                <button onclick="history.back()" class="btn btn-danger btn-rounded waves-effect waves-light mb-5 text-white">Pergi Kembali</button>
            </div>
        </div>
       
    </div>
    <script src="{{ asset("assets/jquery-3.7.1.js") }}"></script>
    <script src="{{ asset("assets/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
    <script>
        $(".preloader").fadeOut();
    </script>
</body>

</html>