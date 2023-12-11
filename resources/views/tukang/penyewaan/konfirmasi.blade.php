@extends('layouts.navbar-dashboard')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Sewa</h1>
        </div>

        <div class="card shadow">
            <div class="my-4">
                @foreach ($sewas as $sewa)
                    <div class="col-md-10 mb-2 mx-auto">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mx-3">
                                        <div class="h6 mb-0 font-weight-bold text-gray-800">Pelanggan : {{ $sewa->nama }}
                                        </div>
                                        <div class="text-xs font-weight-bold text-primary mb-1">
                                            Tipe Sewa : {{ $sewa->tipe_sewa }} | Tipe Bangunan : {{ $sewa->tipe_bangunan }}
                                            | Tipe Pengerjaan : {{ $sewa->tipe_pengerjaan }}
                                        </div>
                                        <div class="text-xs font-weight-bold text-gray mb-1">
                                            Tanggal Sewa : {{ $sewa->tanggal_sewa }} | Tipe Pembayaran :
                                            {{ $sewa->tipe_pembayaran }}
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm" id="lihatDetail"
                                            data-bs-toggle="modal" data-bs-target="#detail-{{ $sewa->id }}">Lihat detail
                                            pengajuan</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="detail-{{ $sewa->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Detail Pengajuan
                                                            Sewa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Pelanggan</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $sewa->nama }}" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="disabledTextInput" class="form-label">Tanggal
                                                                Pelanggan</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $sewa->tanggal_sewa }}" readonly>
                                                        </div>
                                                        <div class="row g-3 align-items-center mb-3">
                                                            <div class="col-auto">
                                                                <label for="disabledTextInput" class="form-label">Tipe
                                                                    Sewa</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $sewa->tipe_sewa }}" readonly>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label for="disabledTextInput" class="form-label">Tipe
                                                                    Bangunan</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $sewa->tipe_bangunan }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 align-items-center mb-3">
                                                            <div class="col-auto">
                                                                <label for="disabledTextInput" class="form-label">Tipe
                                                                    Pengerjaan</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $sewa->tipe_pengerjaan }}" readonly>
                                                            </div>
                                                            <div class="col-auto">
                                                                <label for="disabledTextInput" class="form-label">Tipe
                                                                    Pembayaran</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $sewa->tipe_pembayaran }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="disabledTextInput" class="form-label">Deskripsi
                                                                Kebutuhan</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $sewa->deskripsi }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="btn @if ($sewa->status == 'diterima') btn-success @elseif($sewa->status == 'ditolak') btn-danger @else btn-warning @endif btn-sm text-wrap mb-1 text-capitalize">
                                            {{ $sewa->status }}
                                        </div>
                                    </div>
                                    @if ($sewa->status == 'diproses')
                                        <div class="col-auto mr-3">
                                            <form action="{{ route('tukang.updateStatus', $sewa->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success" value="diterima"
                                                    name="terima">Terima</button>
                                                <button type="submit" class="btn btn-danger" value="ditolak"
                                                    name="tolak">Tolak</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mx-auto">
                {{ $sewas->links() }}
            </div>

        </div>
    </div>
@endsection
