@extends('layouts.navbar-dashboard')
@section('content')
  <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profil</h1>
                    </div>

                         <div class="card shadow mb-4">
                             <div class="card-body mx-auto col-md-8">
                                 <div class="py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Atur Profil</h6>
                        </div>
                               <form class="user" method="POST" action="{{ route('tukang.pengalaman.store') }}" enctype="multipart/form-data">
                                @csrf
                               
            {{-- <div class="mx-auto align-items-center text-center ">
                <img class="rounded-circle mb-0 imagePreview" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            
                <div class="mx-auto align-items-center text-center">
                    <input type="file" class="form-control d-none btn btn-primary btn-sm" style="margin-top: -40px;">Ganti Foto</input>
                </div>
        </div> --}}

<div class="mx-auto align-items-center text-center ">
  <div class="imgUp">
    <div class="imagePreview"></div>
    <div class="mx-auto align-items-center text-center">
      <label class="btn btn-primary btn-sm">
      Ganti foto<input type="file" class="uploadFile d-none" id="foto" name="foto">
      </label>
  </div>
</div>
</div>

                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control"
                                                id="nama" name="nama" required autofocus>
                                        </div>

                                        <div class="row g-2 mb-2">
                                            <div class="form-group col-md-6">
                                              <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                              <input type="text" class="form-control"
                                              id="tempat_lahir" name="tempat_lahir" required autofocus>
                                          </div>
                                             <div class="form-group col-md-6">
                                              <label for="tempat_lahir" class="form-label">Tanggal Lahir</label>
                                              <input type="text" class="form-control"
                                              id="tempat_lahir" name="tempat_lahir" required autofocus>
                                          </div>
                
                                        </div>
                                          <div class="row g-2 mb-4">
                                            <div class="col-md-6">
                                                <select class="form-select" name="kecamatan" id="kecamatan" required>
                                            <option>Pilih Kecamatan ...</option>
                                            </select>
                                                                @error('kecamatan')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                        </div>

                                            <div class="col-md-6">
                                            <select class="form-select" name="desa" id="desa" required>
                                            <option>Pilih Desa ...</option>
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
                                                placeholder="Alamat lengkap"></textarea>
                                        </div>

                                    <select class="form-select form-select-md mb-4" name="keahlians_id" aria-label="Default select example">
                                    <option>Pilih Bidang Keahlian ...</option>                                 
                                    </select>

                                      <div class="input-group mb-4">
                                            <span class="input-group-text">+62</span>
                                            <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon" value="{{ old('no_telepon') }}" required autocomplete="no_telepon" autofocus id="no_telepon" name="no_telepon" placeholder="No Telepon : 85xxxxx..">
                                            @error('no_telepon')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                <div class="input-group mb-4">
                                    <span class="input-group-text">Rp.</span>
                                <input id="harga" type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" placeholder="Pasang harga sewa" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
                                <span class="input-group-text">/Hari</span>
                                                    @error('harga')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                    </div>

     
                                        <button type="submit" class="btn btn-primary btn-user btn-block my-5" style="font-size: 11pt;">
                                            <strong>Simpan Perubahan</strong>
                                        </button>
                                
                                    </form>
                        </div>
                    </div>

                </div>
@endsection

@section('js')
<script type="text/javascript">
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
            uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});
</script>
@endsection