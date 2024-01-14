@extends('layouts.navbar-dashboard')
@section('content')
    <div class="lg:px-8 px-2">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Pengalaman</h1>
        </div>
        {{ Breadcrumbs::render('ubah-pengalaman') }}
        <div class="card shadow mb-4">
            <div class="card-body mx-auto col-md-8">
                <div class="py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengalaman Project</h6>
                </div>
                <form class="user" method="POST" action="{{ route('tukang.pengalaman.update', $pengalaman->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nama">Nama
                            Proyek
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            id="nama_proyek" name="nama_proyek" required autofocus value="{{ $pengalaman->nama_proyek }}">
                    </div>
                    <div class="form-group">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="alamat">Alamat
                        </label>
                        <input type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            id="alamat" name="alamat" required autofocus value="{{ $pengalaman->alamat }}">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Posisi
                        </label>
                        <select
                            class="border border-gray-300 text-sm text-gray-600 text-base rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                            name="keahlians_id">
                            <option>Pilih Posisi Keahlian ...</option>
                            @foreach ($keahlians as $keahlian)
                                <option value="{{ $keahlian->id }}" selected>{{ $keahlian->nama_keahlian }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-x-4 mt-3">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="tanggal_mulai">Tanggal Mulai
                            </label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide datepicker-format="dd/mm/yyyy" type="text"
                                    name="tanggal_mulai"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $pengalaman->tanggal_mulai }}" autocomplete="off" required>
                            </div>
                            @error('tanggal_mulai')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="tanggal_selesai">Tanggal Selesai
                            </label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide datepicker-format="dd/mm/yyyy" type="text"
                                    name="tanggal_selesai"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-50 dark:border-gray-300 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    value="{{ $pengalaman->tanggal_selesai }}" autocomplete="off" required>
                            </div>
                            @error('tanggal_selesai')
                                <span class="text-red-500 text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea rows="3"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                            id="deskripsi" style="border-radius: 8px;" name="deskripsi" required autofocus>{{ $pengalaman->deskripsi }}</textarea>
                    </div>


                    <div class="mx-auto align-items-center text-center ">
                        <div class="imgUp">
                            <img class="imagePreview mb-2"
                                src="{{ url('storage/tukang/pengalaman/' . $pengalaman->foto) }}"
                                style="border-radius: 5px; float: left;" alt="">
                            <div class="input-group">
                                {{-- <input type="file" class="form-control uploadFile" id="foto" name="foto">
                                <label class="input-group-text" for="foto">Perbarui Foto</label> --}}

                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file_input">Upload
                                    file</label>
                                <input
                                    class="uploadFile block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="file_input_help" id="foto" name="foto" type="file">
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG
                                    or GIF
                                </p>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block mb-4 bg-blue-500">
                        <strong>Perbarui Pengalaman</strong>
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).on("click", "i.del", function() {
            $(this).parent().remove();
        });
        $(function() {
            $(document).on("change", ".uploadFile", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return;
                if (/^image/.test(files[0].type)) {
                    var reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onloadend = function() {
                        uploadFile.closest(".imgUp").find('.imagePreview').attr("src", reader.result);
                    }
                }

            });
        });
    </script>
@endsection
