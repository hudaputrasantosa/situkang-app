@extends('layouts.navbar-dashboard')
@section('content')
    <div class="lg:px-8 px-2">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Sewa</h1>
        </div>

        <div class="card shadow">
            <div class="my-6">
                @foreach ($sewas as $sewa)
                    <div class="col-md-10 my-3 mx-auto">
                        <div class="card h-auto py-2">
                            <div class="card-body">
                                <div class="flex lg:flex-row flex-col no-gutters align-items-center">
                                    <div class="col">
                                        <div class="h6 font-weight-bold text-gray-800">Pelanggan : {{ $sewa->nama }}
                                        </div>
                                        <div
                                            class="flex flex-wrap gap-x-2 lg:text-sm text-xs font-weight-bold text-gray mt-1 text-capitalize">
                                            <span>
                                                Tanggal Sewa : {{ $sewa->tanggal_sewa }}
                                            </span>
                                            <span>
                                                Tipe Pembayaran : {{ $sewa->tipe_pembayaran }}
                                            </span>
                                        </div>
                                        <div
                                            class="flex flex-wrap gap-2 text-sm font-semibold text-blue-500 my-2 text-capitalize">
                                            <span class="bg-green-100 px-2 border border-2 rounded-sm">Tipe Sewa :
                                                {{ $sewa->tipe_sewa }}</span>
                                            <span class="bg-green-100 px-2 border border-2 rounded-sm">
                                                Tipe Bangunan : {{ $sewa->tipe_bangunan }}
                                            </span>
                                            <span class="bg-green-100 px-2 border border-2 rounded-sm">
                                                Tipe Pengerjaan : {{ $sewa->tipe_pengerjaan }}
                                            </span>
                                        </div>
                                        <div class="flex flex-wrap items-center gap-2 mt-2">

                                            <button type="button" class="btn btn-primary btn-sm bg-blue-500"
                                                id="lihatDetail" data-bs-toggle="modal"
                                                data-bs-target="#detail-{{ $sewa->id }}">Lihat detail
                                                pengajuan</button>

                                            @php
                                                $kecamatan = Laravolt\Indonesia\Models\District::where('id', $sewa->kecamatan)->first();
                                                $desa = Laravolt\Indonesia\Models\Village::where('id', $sewa->desa)->first();
                                            @endphp


                                            <!-- Modal -->
                                            <div class="modal fade" id="detail-{{ $sewa->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail
                                                                Pengajuan
                                                                Sewa</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M6 18 18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label class="form-label">Nama Pelanggan</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $sewa->nama }}" readonly>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="disabledTextInput" class="form-label">Tanggal
                                                                    Sewa</label>
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
                                                            <div class="row g-3 align-items-center mb-3">
                                                                <div class="col-auto">
                                                                    <label for="disabledTextInput"
                                                                        class="form-label">Kecamatan
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ ucwords(strtolower($kecamatan->name)) }}"
                                                                        readonly>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <label for="disabledTextInput" class="form-label">
                                                                        Desa</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ ucwords(strtolower($desa->name)) }}"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="row g-3 align-items-center mb-3">
                                                                <div class="col-auto">
                                                                    <label for="disabledTextInput" class="form-label">
                                                                        Alamat Lengkap</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $sewa->alamat }}" readonly>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <label for="disabledTextInput" class="form-label">
                                                                        No Telepon</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $sewa->no_telepon }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button
                                                class="btn @if ($sewa->status == 'diterima') btn-success @elseif($sewa->status == 'ditolak') btn-danger @else btn-warning @endif btn-sm text-wrap text-capitalize">
                                                {{ $sewa->status }}
                                            </button>

                                            @if ($sewa->tipe_pembayaran = 'bank')
                                                @php
                                                    $pembayaran = \App\Models\Pembayaran::where('sewas_id', $sewa->id)->first();
                                                @endphp
                                                @if ($pembayaran)
                                                    <div
                                                        class="btn @if ($pembayaran->status == 'paid') btn-success @else btn-warning @endif btn-sm text-wrap text-capitalize">
                                                        {{ $pembayaran->status == 'paid' ? 'Telah Dibayar' : 'Belum Dibayar' }}
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    @if ($sewa->status == 'diproses')
                                        <div class="my-2">
                                            <form action="{{ route('tukang.updateStatus', $sewa->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success bg-green-500 px-4 mr-2"
                                                    value="diterima" name="terima">Terima</button>
                                                <button type="submit" class="btn btn-danger bg-red-500 px-4"
                                                    value="ditolak" name="tolak">Tolak</button>
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
