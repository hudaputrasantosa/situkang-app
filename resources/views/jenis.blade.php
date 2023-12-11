@extends('layouts.app')

@section('content')
    <div class="px-4 mx-auto my-5 mb-4 text-center">
        <h2 class="display-5 mx-5 px-5 fw-bold">Temukan jenis tukang bangunan sesuai kebutuhan anda.</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive prebuilt components, and powerful JavaScript plugins.</p>
            </div>
    </div>

    <div class="container py-5 mt-4">
        <div class="row row-cols-4">
            @foreach ($keahlians as $keahlian)
                <div class="col py-3">
                    <div class="card">
                        <img src="https://fastbootstrap.com/images/cards/1.jpg" class="card-img-top" alt="green iguana" />
                        <div class="card-body">
                            <h5>{{ $keahlian->nama_keahlian }}</h5>
                            <p class="card-text">
                                Lizards are a widespread group of squamate reptiles, with over
                                6,000 species.
                            </p>
                            <div>
                                <button class="btn btn-primary w-100" type="button">Cari Tukang</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
