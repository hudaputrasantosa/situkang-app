@extends('layouts.apps')

@section('content')
{{-- <div class="container">
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
                               <select class="form-select" name="kecamatan" id="kecamatan" required>
  <option>--Pilih Kecamatan--</option>
  @foreach ($kecamatans as $kecamatan ) 
   <option value="{{ $kecamatan->id ?? '' }}">{{ $kecamatan->name ?? '' }}</option>
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
                               <select class="form-select" name="desa" id="desa" required">
  <option>--Pilih Desa--</option>
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
</div> --}}

  <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
       
      <div class="col-lg-5 text-center text-lg-start">
        <h1 class="display-5 fw-bold lh-1 mb-3">Registrasi Akun</h1>
        <p class="col-lg-10 fs-5">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
         <a href="{{ route('homepage') }}" class="w-50 btn btn-md border border-primary border-2"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
      </div>
      <div class="col-md-12 mx-auto col-lg-6">
             <form method="POST" action="{{ route('auth.register.store') }}" class="p-4 p-md-5 border rounded-3 bg-light">
                @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus id="nama" name="nama" placeholder="Nama Lengkap">
            @error('nama')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
              </span>
             @enderror
            <label for="nama">Nama Lengkap</label>
          </div>

           <div class="row g-3 gap-2 mb-2">

              <div class="form-floating col-md-6">
                  <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir" autofocus id="tempat_lahir" placeholder="tempat_lahir">
                  @error('tempat_lahir')
                  <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="nama">Tempat Lahir</label>
        </div>

        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
            <input class="form-control" name="tanggal_lahir" autofocus required type="text" readonly />
            <span class="input-group-addon input-group-text">
                <i class="bi bi-calendar-date"></i>
            </span>
        </div>
        
    </div>

    <div class="row mb-3">
        <span class="mb-1"> Jenis Kelamin :</span>
    <div class="col-md-4">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki">
  <label for="jenis_kelamin">Laki-laki</label>
    </div>
    <div class="col-md-4">
    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
    <label for="jenis_kelamin">Perempuan</label>
    </div>
    </div>

          <div class="row g-2 mx-auto gap-2 mb-3">

              <div class="col-md-6">
                  <select class="form-select" name="kecamatan" id="kecamatan" required>
            <option>Pilih Kecamatan ...</option>
            @foreach ($kecamatans as $kecamatan ) 
            <option value="{{ $kecamatan->id ?? '' }}">{{ ucwords(strtolower($kecamatan->name)) ?? '' }}</option>
            @endforeach
            </select>
                                @error('kecamatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>

            <div class="col-md-5">
            <select class="form-select" name="desa" id="desa" required>
            <option>Pilih Desa ...</option>
            </select>
                                @error('desa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
        </div>

         <div class="form-floating mb-3">
            <textarea class="form-control" name="alamat" style="height: 80px;" placeholder="Jalan, RT/RW dan desa" id="alamat"></textarea>          
             @error('alamat')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
              </span>
             @enderror
            <label for="nama">Alamat</label>
          </div>

           <div class="input-group mb-3">
            <span class="input-group-text">+62</span>
            <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon') }}" required autocomplete="no_telepon" autofocus id="no_telepon" name="no_telepon" placeholder="No Telepon : 85xxxxx..">
            @error('no_telepon')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
              </span>
             @enderror
            {{-- <label for="nama">Nomor telepon</label> --}}
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" name="email" placeholder="name@example.com">
            @error('email')
             <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
              </span>
             @enderror
            <label for="email">Alamat email</label>
          </div>

          <div class="form-floating mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <label for="password">Kata sandi</label>
          </div>

              <div class="form-floating mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi">
                             
            <label for="password">Ulangi kata sandi</label>
          </div>

          <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar akun</button>
          <div class="my-2">
              <small class="text-muted">Jika sudah punya akun, <a href="{{ route('auth.login') }}" class="text-decoration-none fw-semibold"> Masuk disini</a></small>
          </div>
          <hr class="my-4">
              <small class="text-muted">Sebagai <b>tukang bangunan</b>? <a href="{{ route('tukang.login') }}" class="text-decoration-none fw-semibold"> Masuk disini</a></small>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script type="text/javascript">
 $(function () {
            $("#datepicker").datepicker({ 
                autoclose: true, 
                // todayHighlight: true,
                title: "Tanggal Lahir",
                // todayBtn : "linked",
            }).datepicker('update', new Date());
        });

$(document).ready(function (){
    $('#kecamatan').on('change', function () {
        let id = $(this).val();

  $.ajax({
    url: '{{ route("tukang.getDesa") }}',
    type: 'GET',
    data: {
      id: id
    },
    success: function (data) {
      $('#desa').empty();
      $('#desa').append('<option>Pilih Desa ...</option>');
      $.each(data, function (name, id) {
        $('#desa').append(`<option value="${id}">${name.charAt(0).toUpperCase() + name.slice(1).toLowerCase()}</option>`);
      });
    },
    error: function (request, status, error) {
                alert(request.statusText + "[" + request.status + "]");
                alert(request.responseText);
                $('#desa').empty().append('<option value="">Pilih Desa ...</option>');
            }
  });
    });

})
</script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
@endsection
