@extends('layouts.app')
@section('title', 'Situkang | Tipe')
@section('content')
    <div class="container flex flex-col px-3 py-4 mb-10 lg:px-10 mx-auto">
        <div class="mt-4 lg:mt-14">
            <div class="flex">
                <span
                    class="text-blue-500 font-semibold underline underline-offset-4">{{ Breadcrumbs::render('keahlian') }}</span>
                >
                {{ $keahlian->nama_keahlian }}
            </div>

            <div class="my-4">
                <p>Pilih Lokasi</p>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 w-full lg:w-1/4"
                    name="kecamatan" id="kecamatan">
                    <option>Pilih Kecamatan ...</option>
                    <option value="semua">Semua</option>
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

            <div class="">
                <p>{{ $tukangs->count() }} data tukang ditemukan</p>
            </div>

        </div>


        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-2 gap-2">
            {{-- <div class="" id="card">

            </div> --}}
            @if ($tukangs->count() > 0)
                <div class="grid grid-cols-2 gap-x-[6px] gap-y-2 lg:grid-cols-4 lg:gap-x-6 lg:gap-y-4 my-3 lg:my-6" id="layout">
                    @foreach ($tukangs as $tukang)
                        <div class="max-w-xs cursor-pointer rounded-lg bg-white p-1 lg:p-2 shadow border">
                            <img class="w-full rounded-lg object-cover object-center lg:h-64 h-40" loading="lazy"
                                src="@if ($tukang->foto) {{ url('storage/tukang/foto-profil/' . $tukang->foto) }} @else {{ asset('assets/img/user.jpg') }} @endif"
                                alt="tukang" />
                            <div class="w-full mx-auto text-center gap-2">
                                <div class="my-3 items-center justify-between">
                                    <p class="text-sm lg:text-lg font-bold text-gray-600">{{ $tukang->nama }}</p>
                                    <div class="flex text-center items-center justify-center">
                                        <i class="bi bi-geo-alt-fill text-gray-600 mr-0 lg:mr-1">
                                        </i>
                                        @php
                                            $kecamatan = Laravolt\Indonesia\Models\District::where('id', $tukang->kecamatan)->first();
                                            $desa = Laravolt\Indonesia\Models\Village::where('id', $tukang->desa)->first();
                                        @endphp
                                        <p class="text-xs lg:text-sm text-gray-500">
                                            {{ ucwords(strtolower($kecamatan->name)) }},
                                            {{ ucwords(strtolower($desa->name)) }}</p>
                                    </div>
                                    <div class="gap-6">
                                        <p class="text-sm lg:text-base font-medium text-gray-600 my-1">
                                            {{ $tukang->nama_keahlian }}</p>
                                        <p class="text-base lg:text-xl font-bold text-gray-600">Rp.
                                            {{ $tukang->harga }}
                                            <span class="text-sm">/ Hari</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="w-full mb-2 px-2 bottom-0">
                                    <a href="{{ route('tukang.portofolio', $tukang->id) }}">
                                        <button
                                            class="w-full mx-auto px-3 py-2 bg-blue-500 rounded-md text-sm font-semibold text-white">Lihat
                                            Detail</button>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="py-6 text-center justify-center items-center">
                    <img src="https://img.freepik.com/free-vector/flat-design-no-data-illustration_23-2150527124.jpg?w=740&t=st=1703872637~exp=1703873237~hmac=2ea682bd4d24fbe291a71850f5b7a2368324914b43d62d1e0c74dd3792d2f0d8"
                        alt="" loading="lazy" class="object object-contain w-full h-80" srcset="">
                    <h4 class="text-lg font-semibold text-gray-600">Data Tukang tidak ditemukan</h4>
                </div>
            @endif


        </div>
    </div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
         $('#kecamatan').on('change', function() {
                let kecamatanId = $(this).val();
                const element = document.getElementById("card")
                $.ajax({
                    url: `{{ route('tukangs.byKecamatan') }}`,
                    type: 'GET',
                    data: {
                        id: kecamatanId,
                        idk: '{{ $keahlian->id }}'
                    },
                    success: function(result) {
                        if(result.length > 0){
                        $.each(result, function(i, data) {
                            const id = data.id;
                            $('#layout').replaceWith(
                                `<div class="max-w-xs cursor-pointer rounded-lg bg-white p-1 lg:p-2 shadow border" id="layout">
                                <img class="w-full rounded-lg object-cover object-center lg:h-64 h-40" loading="lazy"
                                src="@if('${data.foto}')
                                    {{ url('storage/tukang/foto-profil/' . '${data.foto}') }}
                                  @else
                                     {{ asset('./assets/img/user.jpg') }}
                                @endif"
                                alt="tukang" />
                                <div class="w-full mx-auto text-center gap-2">
                                <div class="my-3 items-center justify-between">
                                    <p class="text-sm lg:text-lg font-bold text-gray-600">${data.nama}</p>
                                    <div class="flex text-center items-center justify-center">
                                        <i class="bi bi-geo-alt-fill text-gray-600 mr-0 lg:mr-1">
                                        </i>
                                        @php
                                            $kecamatan = Laravolt\Indonesia\Models\District::where('id', $tukang->kecamatan)->first();
                                            $desa = Laravolt\Indonesia\Models\Village::where('id', $tukang->desa)->first();
                                        @endphp
                                        <p class="text-xs lg:text-sm text-gray-500">
                                            ${data.kecamatan},
                                            ${data.desa}</p>
                                    </div>
                                    <div class="gap-6">
                                        <p class="text-sm lg:text-base font-medium text-gray-600 my-1">
                                            {{ $tukang->nama_keahlian }}</p>
                                        <p class="text-base lg:text-xl font-bold text-gray-600">Rp.
                                            ${data.harga}
                                            <span class="text-sm">/ Hari</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="w-full mb-2 px-2 bottom-0">
                                    <a href="{{ url('/tukang/portofolio/'.'${id}') }}">
                                        <button
                                            class="w-full mx-auto px-3 py-2 bg-blue-500 rounded-md text-sm font-semibold text-white">Lihat
                                            Detail</button>
                                    </a>
                                </div>
                                </div>
                            </div>
                                `
                            );
                        });
                     } else{
                         $('#layout').replaceWith(
                        `<div class="max-w-xs cursor-pointer rounded-lg bg-white p-1 lg:p-2 shadow border" id="layout">
                        <h1>Data tidak ditemukan</h1>
                        </div>`
                         )
                     }
                    },
                    error: function(request, status, error) {
                        console.log("error")
                        alert(request.statusText + "[" + request.status + "]");
                        alert(request.responseText);
                        $('#desa').empty().append('<option value="">Pilih Desa ...</option>');
                    }
                });
            });
    })
</script>
@endsection
