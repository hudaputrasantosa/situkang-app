@extends('pelanggan.layouts')
@section('title', 'Profile')
@section('content')
<div class="container-fluid lg:px-8">
                        <h3 class="my-4 text-xl font-bold">Atur Profile</h3>
                     <div class="card mb-4">
                            <div class="card-body">
                                <form action="{{ route('pelanggan.profil.update') }}" method="post" enctype="multipart/form-data" class="mt-4 lg:px-20 ">
                                @csrf

                                <div class="mx-auto align-items-center text-center ">
                                    <div class="imgUp">
                                        <img class="imagePreview" src="{{ url('storage/pelanggan/foto-profil/'.$pelanggan->foto) }}" alt="">
                                        <div class="mx-auto align-items-center text-center">
                                        <label class="btn btn-primary btn-sm">
                                        Ganti foto<input type="file" class="uploadFile d-none" id="foto" name="foto">
                                        </label>
                                    </div>
                                    </div>
                                    </div>

                                <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" value="{{ $pelanggan->nama }}">
                                </div>
                                <div class="row g-2 mb-3">

                                    <div class="col-md-6">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="{{ $pelanggan->tempat_lahir }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tanggal_lahir" value="{{ $pelanggan->tanggal_lahir }}">
                                    </div>
                                </div>


                                   <div class="row g-2 mb-4">
                                       <div class="col-md-6">
                                                <label class="form-label">Kecamatan</label>
                                                <select class="form-select" name="kecamatan" id="kecamatan" required>
                                            <option value="{{ $kecamatan->id }}" selected>{{  ucwords(strtolower($kecamatan->name)) }}</option>
                                            @foreach ($kecamatans as $kecamatan )
                                             <option value="{{ $kecamatan->id }}">{{ ucwords(strtolower($kecamatan->name)) ?? ''  }}</option>
                                            @endforeach
                                            </select>
                                                                @error('kecamatan')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                        </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Desa</label>
                                            <select class="form-select" name="desa" id="desa" required>
                                            <option value="{{ $desa->id }}" selected>{{  ucwords(strtolower($desa->name)) }}</option>
                                            </select>
                                                                @error('desa')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                        </div>
                                        </div>

                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3">{{ $pelanggan->alamat }}</textarea>
                                </div>

                                <label class="form-label">No Telepon</label>
                                <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">+62</span>
                                <input type="text" class="form-control" name="no_telepon" aria-describedby="basic-addon1" value="{{ $pelanggan->no_telepon }}">
                                </div>
                                <div class="py-4">
                                    <button type="submit" class="btn btn-primary bg-blue-500 w-100">Perbarui Data</button>
                                </div>
                            </form>
                            </div>
                        </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function (){
    $('#kecamatan').on('change', function () {
        let id = $(this).val();

  $.ajax({
    url: '{{ route("tukang.getDesa") }}',
    type: 'GET',
    data: {
      id: id
    },
    success: function (data) {
      $.each(data, function (name, id) {
        $('#desa').append(`<option value="${id}">${name.charAt(0).toUpperCase() + name.slice(1).toLowerCase()}</option>`);
      });
    },
    error: function (request, status, error) {
                alert(request.statusText + "[" + request.status + "]");
                alert(request.responseText);
                $('#desa').empty().append('<option value="">Pilih Desa ...</option>');
            }
  });
    });
});

$(document).on("click", "i.del" , function() {
	$(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function(){
    	var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;
        if (/^image/.test( files[0].type)){
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function(){
            uploadFile.closest(".imgUp").find('.imagePreview').attr("src", reader.result);
            }
        }

    });
});
</script>
@endsection
