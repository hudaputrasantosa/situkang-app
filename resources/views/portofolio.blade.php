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

  <div class="px-4 py-2 my-5 text-center">
    @foreach ($tukangs as $tukang )
    <img class="aspect-ratio-object-cover rounded mb-4" src="https://img.freepik.com/free-photo/medium-shot-man-looking-document_23-2148751962.jpg?w=740&t=st=1695805888~exp=1695806488~hmac=56a0a57fc10257a34b52637b9f08f849dfebd2b2f05a2a78b2d792ad61894202" alt="" width="200">
    <h1 class="display-6 fw-bold">{{ $tukang->nama }}</h1>
    <p>{{ $tukang->nama_keahlian }}</p>
    <p>{{ $tukang->kecamatan }}, {{ $tukang->desa }}</p>
    <div class="col-lg-6 mx-auto">
      @if ($tukang->deskripsi == null)
           <p class="lead mb-4">Deskripsi tukang belum tersedia</p>
           @else
           <p class="lead mb-4">{{ $tukang->deskripsi }}</p>
           {{-- <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p> --}}
      @endif
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Ajukan Sewa</button>
      </div>
    </div>      
    @endforeach
  </div>
@endsection