@extends('layouts.app')
@section('head-section')
<link href="{{ asset('assets/css/heroes.css') }}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
@endsection
@section('content')
<h1 class="visually-hidden">Heroes examples</h1>

  <div class="px-4 py-2 my-4 text-center">
    <img class="aspect-ratio-object-cover rounded mb-3 border" src="@if($tukang[0]->foto){{ url('storage/tukang/foto-profil/'.$tukang[0]->foto) }} @else https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg @endif" alt="" width="200">
    <h2 class="display-6 fw-bold">{{ $tukang[0]->nama }}</h2>
    <p class="mb-1 fs-5 fw-bolder">{{ $tukang[0]->nama_keahlian }}</p>
    <p class="mb-3 mt-0 fs-6" style="font-size: 10pt;">
      <i class="bi bi-geo-alt-fill">
      </i> 
      {{ $tukang[0]->kecamatan }}, {{ $tukang[0]->desa }}
    </p>
    <div class="col-lg-8 card border-left-primary shadow h-100 py-5 mx-auto">
      <div class="text-start px-5">
        <h5>Deskripsi</h5>
        @if ($tukang[0]->deskripsi == null)
        <p>Deskripsi tukang belum tersedia</p>
        @else
           <p class="mb-4">{!! $tukang[0]->deskripsi !!}</p>
           @endif
          </div>
          <div class="col-md-12 text-start mb-5 px-5">
      <h5>Pengalaman</h5>
      @if (count($pengalaman) === 0)
        <p>Belum mempunyai pengalaman</p>
      @else
                          <div class="py-1">
                              <div class="card-body">
                                  <div class="row text-start no-gutters align-items-center">
                                      <div class="col-auto">
                                          <img src="{{ asset('assets/img/pengalaman/'.$pengalaman[0]->foto)}}" class="rounded" width="120px" alt="">
                                      </div>
                                      <div class="col mx-1">
                                          <div class="h6 mb-0 fw-bold text-gray-800">{{ $pengalaman[0]->nama_proyek }}</div>
                                          <div class="text-xs font-weight-bold text-gray-500 mb-1">
                                             {{ $pengalaman[0]->alamat }}
                                          </div>
                                           <div class="text-xs fw-semibold text-gray mb-1" style="font-size: 10.5pt;">
                                             <i class="bi bi-calendar-date" style="margin-right: 2px;"></i> {{ $pengalaman[0]->tanggal_mulai }} Sampai {{ $pengalaman[0]->tanggal_selesai }}  <i class="bi bi-briefcase-fill" style="margin: 0px 2px 0px 10px;"></i> {{ $pengalaman[0]->nama_keahlian }}
                                          </div>
                                           <div class="text-gray mb-1" style="font-size: 10pt;">
                                             {{ $pengalaman[0]->deskripsi }}
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endif
                        </div>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <a type="button" class="btn btn-primary col-4 btn-lg mx-auto"  @if(Auth::check()) data-bs-toggle="modal" data-bs-target="#sewa" @else href="{{ route('auth.login') }}" @endif>Ajukan Sewa</a>
      </div>

      
      <div class="modal fade" id="sewa" tabindex="-1" aria-labelledby="sewaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="sewaLabel">Form pengajuan sewa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('pelanggan.sewa') }}" method="POST" class="modal-body text-start">
        @csrf
        <input type="hidden" name="tukangs_id" value="{{ $tukang[0]->id }}">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tanggal Sewa</label>
         <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                              <input class="form-control" name="tanggal_sewa" autofocus required type="text" />
                                              <span class="input-group-addon input-group-text">
                                                  <i class="bi bi-calendar-date"></i>
                                              </span>
                                          </div>
      </div>
      <div class="mb-3">
        <label for="durasi" class="form-label">Durasi</label>
        <div class="input-group">
          <input type="number" class="form-control" name="durasi" id="durasi" aria-describedby="basic-addon3 basic-addon4">
          <span class="input-group-text" id="basic-addon3">Hari</span>
        </div>
        <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div>
      </div>
      <select class="form-select" name="metode_pembayaran" aria-label="Default select example">
      <option selected>Pilih metode pembayaran ...</option>
      <option value="cod">Bayar di tempat</option>
      <option value="bank">Bank</option>
    </select>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      <button type="submit" class="btn btn-primary">Ajukan sewa sekarang</button>
    </form>
      </div>
    </div>
  </div>
</div>
    </div>      
  </div>
  @endsection
  @section('js')
<script type="text/javascript">
 $(function () {
            $("#datepicker").datepicker({ 
                autoclose: true, 
                todayHighlight: true,
                title: "Tanggal Mulai",
                // todayBtn : "linked",
            }).datepicker('update', new Date());
        });
</script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    @endsection