@extends('layouts.navbar-dashboard')
@section('content')
    <div class="lg:px-8 px-2">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profil</h1>
            {{-- {{ Auth::user()->nama }} --}}
        </div>

        <div class="card shadow mb-4">
            <div class="card-body mx-auto col-md-8">

                <form action="{{ route('tukang.profile.update', $tukangs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mx-auto align-items-center text-center ">
                        <div class="imgUp">
                            <img class="imagePreview" src="{{ url('storage/tukang/foto-profil/' . $tukangs->foto) }}"
                                alt="">
                            <div class="mx-auto align-items-center text-center">
                                <label class="btn btn-primary btn-sm">
                                    Ganti foto<input type="file" class="uploadFile d-none" id="foto" name="foto">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <h6 class="m-0 text-xl font-weight-bold text-primary">Atur Data Pribadi</h6>
                    </div>

                    <div class="form-group">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $tukangs->nama }}" required autofocus>
                    </div>

                    <div class="row g-2 mb-2">
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ $tukangs->tempat_lahir }}" required autofocus>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tanggal_lahir"
                                value="{{ $tukangs->tanggal_lahir }}" required autofocus>
                        </div>

                    </div>
                    <div class="row g-2 mb-4">
                        <div class="col-md-6">
                            <select
                                class="border border-gray-300 text-gray-700 text-base rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="kecamatan" id="kecamatan" required>
                                <option value="{{ $kecamatan->id }}" selected>{{ ucwords(strtolower($kecamatan->name)) }}
                                </option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ ucwords(strtolower($kecamatan->name)) ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kecamatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <select
                                class="border border-gray-300 text-gray-700 text-base rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                name="desa" id="desa" required>
                                <option value="{{ $desa->id }}" selected>{{ ucwords(strtolower($desa->name)) }}
                                </option>
                            </select>
                            @error('desa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <textarea rows="2" class="form-control" id="alamat" name="alamat" required autofocus
                            placeholder="Alamat harus di isi..">{{ $tukangs->alamat }}</textarea>
                    </div>

                    <div class="py-3">
                        <h6 class="m-0  text-xl font-weight-bold text-primary">Atur Data Pekerjaan</h6>
                    </div>
                    <label for="keahlians_id" class="form-label">Nama Keahlian</label>
                    <select
                        class="border border-gray-300 text-gray-700 text-base rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                        name="keahlians_id">
                        <option value="{{ $tukangs->keahlians_id }}" selected>{{ $tukangs->nama_keahlian }}</option>
                        @foreach ($keahlians as $keahlian)
                            <option value="{{ $keahlian->id }}">{{ $keahlian->nama_keahlian }}</option>
                        @endforeach
                    </select>

                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <div class="input-group mb-4">
                        <span class="input-group-text">+62</span>
                        <input type="number" class="form-control @error('no_telepon') is-invalid @enderror"
                            name="no_telepon" required autocomplete="no_telepon" autofocus id="no_telepon" name="no_telepon"
                            placeholder="No Telepon : 85xxxxx.." value="{{ $tukangs->no_telepon }}" maxlength="16">
                        @error('no_telepon')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="harga" class="form-label">Harga sewa</label>
                    <div class="input-group mb-4">
                        <span class="input-group-text">Rp.</span>
                        <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror"
                            name="harga" placeholder="Pasang harga sewa" value="{{ $tukangs->harga }}" required
                            autocomplete="harga" autofocus>
                        <span class="input-group-text">/Hari</span>
                        @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label for="deskripsi" class="form-label">Deskripsi Portofolio</label>
                    <div class="form-group mb-4">
                        <textarea class="form-control" id="editor" name="deskripsi" placeholder="Deskripsi portofolio harus di isi..">{{ $tukangs->deskripsi }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary bg-blue-500 btn-user btn-block p-2 my-5"
                        style="font-size: 11pt;">
                        <strong>Simpan Perubahan</strong>
                    </button>

                </form>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#harga').on('keydown', function(event) {
                if (event.key === "," || event.key === "." || event.key === "-") {
                    event.preventDefault();
                }
            });

            $('#harga').mask('000,000,000', {
                reverse: true
            });

            $('#kecamatan').on('change', function() {
                let id = $(this).val();

                $.ajax({
                    url: '{{ route('tukang.getDesa') }}',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        //   $('#desa').empty();
                        //   $('#desa').append('<option>Pilih Desa ...</option>');
                        $.each(data, function(name, id) {
                            $('#desa').append(
                                `<option value="${id}">${name.charAt(0).toUpperCase() + name.slice(1).toLowerCase()}</option>`
                                );
                        });
                    },
                    error: function(request, status, error) {
                        alert(request.statusText + "[" + request.status + "]");
                        alert(request.responseText);
                        $('#desa').empty().append('<option value="">Pilih Desa ...</option>');
                    }
                });
            });
        });

        ClassicEditor
            .create(document.querySelector('#editor'), {
                toolbar: {
                    items: [
                        'heading',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        'insertTable',
                    ]
                },
            })
            .catch(error => {
                console.error(error);
            });

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
