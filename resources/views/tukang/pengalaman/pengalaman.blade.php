@extends('layouts.navbar-dashboard')
@section('content')
    <div class="lg:px-8 px-2">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengalaman</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 mb-4">
                <a href="{{ route('tukang.pengalaman.tambah') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-80">
                        <i class="bi bi-plus-square"></i>
                    </span>
                    <span class="text">Tambah Pengalaman</span>
                </a>
            </div>

            @foreach ($pengalamans as $pengalaman)
                <div class="col-md-12 mb-2">
                    <div class="card h-auto py-1">
                        <div class="card-body">
                            <div class="flex lg:flex-row flex-col no-gutters items-center justify-start text-justify">
                                <div class="col-auto mb-2">
                                    <img src="{{ url('storage/tukang/pengalaman/' . $pengalaman->foto) }}"
                                        class="object-cover lg:w-44 w-60 lg:h-32 h-36 object-center rounded-md border border-2"
                                        alt="">
                                </div>
                                <div class="col mx-3">
                                    <div class="h6 mb-0 font-weight-bold text-gray-900">{{ $pengalaman->nama_proyek }}</div>
                                    <div class="text-sm font-weight-bold text-primary mb-1">
                                        {{ $pengalaman->alamat }}
                                    </div>
                                    <div
                                        class="flex lg:flex-row flex-col gap-x-2 gap-y-1 lg:items-center items-start text-sm font-semibold text-gray-800 mb-1">
                                        <span
                                            class="bg-green-100 px-2 border border-2 rounded-sm">{{ $pengalaman->tanggal_mulai }}
                                            s/d {{ $pengalaman->tanggal_selesai }}</span> <span
                                            class="bg-green-100 px-2 border border-2 rounded-sm">
                                            {{ $pengalaman->nama_keahlian }}
                                        </span>
                                    </div>
                                    <div class="text-sm text-gray mb-1">
                                        {{ $pengalaman->deskripsi }}
                                    </div>
                                </div>
                                <div class="flex flex-row gap-2 mt-1">
                                    <a href="{{ route('tukang.pengalaman.tampil', $pengalaman->id) }}"
                                        class="btn btn-primary px-4">Ubah</a>
                                    <a href="" class="btn btn-danger px-4" data-toggle="modal"
                                        data-target="#hapusPengalamanModal">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Logout Modal-->
                <div class="modal fade" id="hapusPengalamanModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apakah yakin untuk hapus pengalaman ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Pilih "Ya, hapus" jika ingin menghapus data pengalaman yang kamu pilih
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary bg-gray-600" type="button"
                                    data-dismiss="modal">Batal</button>
                                <a class="btn btn-danger" href="{{ route('tukang.pengalaman.hapus', $pengalaman->id) }}">Ya,
                                    hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
