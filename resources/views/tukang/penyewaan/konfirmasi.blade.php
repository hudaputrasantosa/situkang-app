@extends('layouts.navbar-dashboard')
@section('content')
  <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Konfirmasi Sewa</h1>
                    </div>

                       <div class="card shadow mb-4">                      
                        @foreach($sewas as $sewa)
                        <div class="col-md-10 mb-4 my-4 mx-auto">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mx-3">
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">Pelanggan : {{ $sewa->nama }}</div>
                                            <div class="text-xs font-weight-bold text-primary mb-1">
                                              Durasi : {{ $sewa->durasi }} Hari
                                            </div>
                                             <div class="text-xs font-weight-bold text-gray mb-1">
                                              Tanggal Sewa : {{ $sewa->tanggal_sewa }}  |  Pembayaran : {{ $sewa->metode_pembayaran }}
                                            </div>
                                             <div class="badge @if($sewa->status == "diterima") bg-success @elseif($sewa->status == "ditolak") bg-danger @else bg-warning @endif text-wrap mb-1 text-capitalize">
                                               {{ $sewa->status }}
                                            </div>
                                        </div>
                                        @if ($sewa->status == "diproses")
                                        <div class="col-auto mr-3">
                                            <form action="{{ route('tukang.updateStatus', $sewa->id) }}" method="post">
                                                @csrf
                                            <button type="submit" class="btn btn-success" value="diterima" name="terima">Terima</button>
                                            <button type="submit" class="btn btn-danger" value="ditolak" name="tolak">Tolak</button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
@endsection