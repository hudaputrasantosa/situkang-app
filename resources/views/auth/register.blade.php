@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.register.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama Lengkap') }}</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           <div class="row mb-3">
                            <label for="kecamatan" class="col-md-4 col-form-label text-md-end">{{ __('Kecamatan') }}</label>
                            <div class="col-md-6">
                               <select class="form-select" name="kecamatan" aria-label="Default select example">
  <option selected>--Pilih Kecamatan--</option>
  @foreach ($kecamatans as $kecamatan ) 
  <option value="{{ $kecamatan['name'] }}">{{ $kecamatan['name'] }}</option>
  @endforeach
</select>
                                @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                                   <div class="row mb-3">
                            <label for="desa" class="col-md-4 col-form-label text-md-end">{{ __('Desa') }}</label>
                            <div class="col-md-6">
                               <select class="form-select" name="desa" aria-label="Default select example">
  <option selected>--Pilih Desa--</option>
  @foreach ($desas as $desa ) 
  <option value="{{ $desa['name'] }}">{{ $desa['name'] }}</option>
  @endforeach
</select>
                                @error('desa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                                   <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="alamat" placeholder="Jalan, RT/RW dan desa" id="alamat"></textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                                                <div class="row mb-3">
                            <label for="no_telepon" class="col-md-4 col-form-label text-md-end">{{ __('No Telepon') }}</label>
                            <div class="col-md-6">
                                <input id="no_telepon" type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" placeholder="contoh : 6285xxxxxx" value="{{ old('no_telepon') }}" required autocomplete="no_telepon" autofocus>
                                @error('no_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
