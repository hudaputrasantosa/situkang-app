@extends('layouts.app')

@section('content')
    <main>
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-4">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="https://img.freepik.com/free-photo/civil-engineer-construction-worker-architects-wearing-hardhats-safety-vests-are-working-together-construction-site-building-home-cooperation-teamwork-concept_640221-172.jpg?w=740&t=st=1695739276~exp=1695739876~hmac=ee72b6df4c1e90f9731015762bb1397a9420fde5c69f6ebafd8f04d95d1bf36f"
                        class="d-block mx-lg-auto img-fluid rounded" width="600" height="400" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-6 fw-bold lh-1 mb-3">Temukan jenis tukang bangunan sesuai kebutuhan anda.</h2>
                    <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                        most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                        system, extensive prebuilt components.</p>
                </div>
            </div>
        </div>

        <div class="container px-4 py-5 mt-4 mx-auto text-center" id="featured-3">
            <h3 class="pb-2">Cara Kerja SiTukang</h3>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#collection" />
                        </svg>
                    </div>
                    <h3 class="fs-2">Featured title</h3>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                        and probably just keep going until we run out of words.</p>

                </div>
                <div class="feature col">
                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#people-circle" />
                        </svg>
                    </div>
                    <h3 class="fs-2">Featured title</h3>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                        and probably just keep going until we run out of words.</p>

                </div>
                <div class="feature col">
                    <div
                        class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#toggles2" />
                        </svg>
                    </div>
                    <h3 class="fs-2">Featured title</h3>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence
                        and probably just keep going until we run out of words.</p>

                </div>
            </div>
        </div>


        <div class="album py-3 bg-light">
            <div class="py-2 col-5 mb-4 mx-auto text-center">
                {{-- <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Cari Tukang.." aria-describedby="inputGroup-sizing-default"> --}}
                <h4 class="mt-5">Tukang Terdekat</h4>
            </div>
            <div class="container col-md-12">


                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2 gap-2">
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


                </div>
            </div>
        </div>

    </main>
@endsection

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
