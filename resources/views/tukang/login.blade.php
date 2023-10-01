@extends('layouts.apps')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tukang.authenticate') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <p>Belum Punya Akun? <a href="{{ route('tukang.register') }}">Klik Halaman ini</a></p>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
  <div class="container col-xl-10 col-xxl-8 px-4 py-3">
    <div class="row align-items-center g-lg-5 py-5">
       
      <div class="col-lg-6 text-center text-lg-start">
        <h1 class="display-5 fw-bold lh-1 mb-3">Masuk akun</h1>
        <img class="d-block img-fluid rounded" width="450" src="https://img.freepik.com/free-photo/unsure-young-male-engineer-wearing-safety-helmet-uniform-looking-camera-keeping-arms-crossed-isolated-white-background_141793-132922.jpg?w=740&t=st=1695800340~exp=1695800940~hmac=26d9b2073cf3076bdeab40c484b55b5bb2d057740324de1deec63073ee259ace" alt="">
        <p class="col-lg-10 fs-5">Below is an example form built entirely with Bootstrap’s form controls. Each required</p>
         <a href="{{ route('homepage') }}" class="w-50 btn btn-md border border-primary border-2"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
             <form method="POST" action="{{ route('tukang.authenticate') }}" class="p-4 p-md-5 border rounded-3 bg-light">
                @csrf
          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" name="email" placeholder="name@example.com">
            @error('email')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
              </span>
             @enderror
            <label for="floatingInput">Alamat email</label>
          </div>
          <div class="form-floating mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <label for="floatingPassword">Kata sandi</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk sebagai tukang</button>
          <div class="my-2">
              <small class="text-muted">Jika belum punya akun, <a href="{{ route('tukang.register') }}" class="text-decoration-none fw-semibold"> Daftar disini</a></small>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
