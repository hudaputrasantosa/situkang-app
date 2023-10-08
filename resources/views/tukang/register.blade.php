@extends('layouts.apps')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tukang.store') }}">
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
  <option value="{{ $kecamatan->id ?? '' }}">{{ ucwords(strtolower($kecamatan->name)) ?? '' }}</option>
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
                               <select class="form-select" name="desa" id="desa" required>
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
                            <label for="desa" class="col-md-4 col-form-label text-md-end">{{ __('Bidang Keahlian') }}</label>
                            <div class="col-md-6">
                               <select class="form-select" name="id_keahlian" id="id_keahlian" required>
  <option>--Pilih Bidang Keahlian--</option>
  @foreach($keahlians as $keahlian)
  <option value="{{ $keahlian->id_keahlian }}">{{ $keahlian->nama_keahlian}}</option>
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
                            <label for="no_telepon" class="col-md-4 col-form-label text-md-end">{{ __('Harga Sewa') }}</label>
                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Pasang harga sewa" value="{{ old('no_telepon') }}" required autocomplete="no_telepon" autofocus>
                                @error('harga')
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


  <div class="container col-xl-10 col-xxl-8 px-4 py-3">
    <div class="row align-items-center g-lg-5 py-5">
       
      <div class="col-lg-5 text-center text-lg-start mb-2">
        <h1 class="display-5 fw-bold lh-1 mb-3">Registrasi Akun</h1>
        <img class="d-block img-fluid rounded mb-2" width="450" src="https://img.freepik.com/free-vector/construction-hat-concept-illustration_114360-8914.jpg?w=740&t=st=1695802909~exp=1695803509~hmac=4717c9b1ba393d65e3c6443c0af47fe4e441305795d0fbd0d698bf3076c20a0d" alt="">
        <a href="{{ route('homepage') }}" class="w-50 btn btn-md border border-primary border-2"><i class="bi bi-arrow-left"></i> Kembali ke beranda</a>
      </div>
      <div class="col-md-12 mx-auto col-lg-7">
             <form method="POST" action="{{ route('tukang.store') }}" class="p-4 p-md-5 border rounded-3 bg-light">
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

    {{-- <div class="row mb-3">
        <span class="mb-1"> Jenis Kelamin :</span>
    <div class="col-md-3">
  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki">
  <label for="jenis_kelamin">Laki-laki</label>
    </div>
    <div class="col-md-4">
    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
    <label for="jenis_kelamin">Perempuan</label>
    </div>
    </div> --}}

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

         <div class="row g-2 mx-auto gap-2 mb-3">

              <div class="col-md-12">
                  <select class="form-select" name="keahlians_id" id="keahlians_id" required>
                    <option>Pilih Bidang Keahlian ...</option>
                    @foreach($keahlians as $keahlian)
                    <option value="{{ $keahlian->id }}">{{ $keahlian->nama_keahlian}}</option>
                    @endforeach
</select>
                                @error('id_keahlian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>

            <div class="input-group col-md-2">
                <span class="input-group-text">Rp.</span>
             <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Pasang harga sewa" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
              <span class="input-group-text">/Hari</span>
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          </div>
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

          <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar sebagai tukang</button>
          <div class="my-2">
              <small class="text-muted">Jika sudah punya akun, <a href="{{ route('tukang.login') }}" class="text-decoration-none fw-semibold"> Masuk disini</a></small>
          </div>
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

    $('#harga').mask('000.000.000', {reverse: true});

})
</script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
@endsection
