@extends('pelanggan.layouts')
@section('title', 'Sewa')
@section('content')
    <div class="container-fluid lg:px-8">
        <h3 class="my-4 text-xl font-bold">Riwayat Pengajuan Sewa</h3>


                <div class="card mb-4">

                    <div class="card-body items-center">
                        <table id="datatablesSimple">
                            <thead class="text-gray-900 lg:text-base font-semibold">
                                <tr>
                                    <th>Nama Tukang</th>
                                    <th>Tanggal</th>
                                    <th>Tipe Sewa</th>
                                    <th>Tipe Bangunan</th>
                                    <th>Tipe Pengerjaan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama Tukang</th>
                                    <th>Tanggal</th>
                                    <th>Tipe Sewa</th>
                                    <th>Tipe Bangunan</th>
                                    <th>Tipe Pengerjaan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($sewas as $sewa)
                                    <tr class="text-sm">
                                        <td>{{ $sewa->nama_tukang }}</td>
                                        <td>{{ $sewa->tanggal_sewa }}</td>
                                        <td>{{ $sewa->tipe_sewa }}</td>
                                        <td>{{ $sewa->tipe_bangunan }}</td>
                                        <td>{{ $sewa->tipe_pengerjaan }}</td>
                                        <td>
                                            <span
                                                class="text-capitalize badge @if ($sewa->status == 'diproses') bg-warning @elseif($sewa->status == 'ditolak') bg-danger @else bg-success @endif">
                                                {{ $sewa->status }}
                                        </td>
                                        </span>
                                        <td>
                                            <button type="button" class="btn btn-primary bg-blue-500 text-sm " id="lihatDetail"
                                                data-bs-toggle="modal" data-bs-target="#detail-{{ $sewa->id }}">Lihat
                                                Detail</button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="detail-{{ $sewa->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Detail Pengajuan Sewa
                                                    </h5>
                                                    <button type="button" class=" items-center justify-center text-gray-900" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
</svg>

                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="flex lg:flex-row flex-col w-full gap-x-6 gap-y-2 mb-2">
                                                        <div class="col-auto">
                                                            <label for="disabledTextInput" class="form-label">Nama
                                                                Tukang</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $sewa->nama_tukang }}" readonly>
                                                        </div>
                                                        <div class="col-auto">
                                                            <label for="disabledTextInput" class="form-label">Tanggal
                                                                Sewa</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $sewa->tanggal_sewa }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="flex lg:flex-row flex-col w-full gap-x-6 gap-y-2 mb-2">
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
                                                    <div class="flex lg:flex-row flex-col w-full gap-x-6 gap-y-2 mb-2">
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
                                                    <div class="flex lg:flex-row flex-col w-full gap-x-4 gap-y-2 mb-2">
                                                        <div class="col-auto">
                                                            <label for="disabledTextInput" class="form-label">Status
                                                                Sewa
                                                            </label>
                                                            {{-- <input type="text" class="form-control"
                                                                value="{{ $sewa->status }}" readonly> --}}
                                                            <div>
                                                                <h4
                                                                    class="text-capitalize badge @if ($sewa->status == 'diproses') bg-warning @else bg-success @endif">
                                                                    {{ $sewa->status }}</h4>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $payment = App\Models\Pembayaran::where('sewas_id', $sewa->id)->first();

                                                            // @dd([$sewa->id, $payment->status]);

                                                        @endphp
                                                        <div class="col-auto">
                                                            <label for="disabledTextInput" class="form-label">Status
                                                                Pembayaran</label>
                                                            @if ($sewa->tipe_pembayaran !== 'bank')
                                                                <input type="text" class="form-control"
                                                                    value="Bayar Ditempat" readonly>
                                                            @else
                                                                <input type="text" class="form-control"
                                                                    value="{{ $payment ? ($payment->status == 'paid' ? 'Telah Dibayar' : 'Belum Dibayar') : $sewa->status }}"
                                                                    readonly>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Harga
                                                        </label>
                                                        <h5><span class="font-semibold text-xl">Rp. {{ $sewa->harga }}</span>
                                                        </h5>
                                                    </div>

                                                    <div class="mb-3 w-100">
                                                        <a href="{{ route('pembayaran.checkout', $sewa->id) }}"
                                                            class="btn btn-primary w-100 @if ($sewa->status == 'diproses' || $sewa->tipe_pembayaran == 'bayar di tempat') disabled @endif">Lanjut
                                                            Pembayaran</a>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/datatables-simple-demo.js') }}"></script>
@endsection
