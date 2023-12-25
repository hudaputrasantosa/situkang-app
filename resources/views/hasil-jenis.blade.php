@extends('layouts.app')
@section('title', 'Situkang | Tipe')
@section('content')
    <div class="container col-md-12">
        <div class="row-cols-sm-2">
            {{ Breadcrumbs::render('keahlian') }} {{ $nama_keahlian }}
        </div>
        <div class="mx-auto py-2">
            <p>Pilih Lokasi</p>
            <div class="col-md-3">
                <select class="form-select" name="kecamatan" id="kecamatan" required>
                    <option>Pilih Kecamatan ...</option>
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id ?? '' }}">
                            {{ ucwords(strtolower($kecamatan->name)) ?? '' }}</option>
                    @endforeach
                </select>
                @error('kecamatan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="mx-auto py-2">
            <p>{{ $tukangs->count() }} data tukang ditemukan</p>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2 gap-2">
            @if ($tukangs->count() > 0)
                {{-- <div class="py-2 col-5 mb-4 mx-auto text-center">
                    <p>{{ $tukangs->count() }} data tukang ditemukan</p>
                </div> --}}
                @foreach ($tukangs as $tukang)
                    <div class="card m-2" style="width: 16rem;">
                        <a href="{{ route('tukang.portofolio', $tukang->id) }}" class="text-decoration-none text-body">
                            <div class="img-thumbnail aspect-ratio aspect-ratio-1x1 mt-1">
                                <img src="@if ($tukang->foto) {{ url('storage/tukang/foto-profil/' . $tukang->foto) }} @else https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg @endif"
                                    class="card-img-top aspect-ratio-object-cover"
                                    style="object-fit: cover; object-position: center;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $tukang->nama }}</h5>
                                <div class="row d-flex align-items-center">

                                    <p class="mb-0" style="font-size: 10pt;">
                                        <i class="bi bi-geo-alt-fill">
                                        </i>
                                        @php
                                            $kecamatan = Laravolt\Indonesia\Models\District::where('id', $tukang->kecamatan)->first();
                                            $desa = Laravolt\Indonesia\Models\Village::where('id', $tukang->desa)->first();
                                        @endphp

                                        {{ ucwords(strtolower($kecamatan->name)) }},
                                        {{ ucwords(strtolower($desa->name)) }}
                                    </p>
                                </div>
                                <div class="mb-0">
                                    <p>{{ $tukang->nama_keahlian }}</p>
                                    <p class="fs-5">Rp {{ $tukang->harga }} /Hari</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="py-2 col-5 mb-4 mx-auto text-center">
                    {{-- <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Cari Tukang.." aria-describedby="inputGroup-sizing-default"> --}}
                    <h4 class="mt-5">Tukang tidak ditemukan</h4>
                </div>
            @endif


        </div>
    </div>

@endsection()
