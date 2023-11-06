@extends('layouts.navbar-dashboard')
@section('content')
  <div class="container-fluid">
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
                        
                        @foreach($pengalamans as $pengalaman)
                        <div class="col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <img src="{{ url('storage/tukang/pengalaman/'.$pengalaman->foto)}}" class="rounded" width="120px" alt="">
                                        </div>
                                        <div class="col mx-3">
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">{{ $pengalaman->nama_proyek }}</div>
                                            <div class="text-xs font-weight-bold text-primary mb-1">
                                               {{ $pengalaman->alamat }}
                                            </div>
                                             <div class="text-xs font-weight-bold text-gray mb-1">
                                               {{ $pengalaman->tanggal_mulai }} Sampai {{ $pengalaman->tanggal_selesai }}  |  {{ $pengalaman->nama_keahlian }}
                                            </div>
                                             <div class="text-xs text-gray mb-1">
                                               {{ $pengalaman->deskripsi }}
                                            </div>
                                        </div>
                                        <div class="col-auto mt-1">
                                            <a href="{{ route('tukang.pengalaman.tampil', $pengalaman->id) }}" class="btn btn-primary">Ubah</a>
                                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#hapusPengalamanModal" >Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                            <!-- Logout Modal-->
    <div class="modal fade" id="hapusPengalamanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah yakin untuk hapus pengalaman ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Ya, hapus" jika ingin menghapus data pengalaman yang kamu pilih</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-danger" href="{{ route('tukang.pengalaman.hapus', $pengalaman->id ) }}">Ya, hapus</a>
                </div>
            </div>
        </div>
    </div>
                        @endforeach

                    </div>
                </div>


@endsection