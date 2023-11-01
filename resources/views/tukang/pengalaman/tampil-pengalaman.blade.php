@extends('layouts.navbar-dashboard')
@section('content')
  <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Update Pengalaman</h1>
                    </div>

                       <div class="card shadow mb-4">
                        <div class="card-body mx-auto col-md-8">
                            <div class="py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengalaman Project</h6>
                        </div>
                               <form class="user" method="POST" action="{{ route('tukang.pengalaman.update', $pengalaman->id ) }}" enctype="multipart/form-data">
                                @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nama_proyek" name="nama_proyek" required autofocus
                                               value="{{ $pengalaman->nama_proyek }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="alamat" name="alamat" required autofocus
                                                value="{{ $pengalaman->alamat }}">
                                        </div>

                                    <select class="form-select form-select-md mb-4" name="keahlians_id" style="height: 50px; border-radius: 30px; font-size: 11pt;" aria-label="Default select example">
                                    <option>Pilih Posisi Keahlian ...</option>
                                    @foreach ($keahlians as $keahlian )
                                    <option value="{{ $keahlian->id }}">{{ $keahlian->nama_keahlian }}</option>    
                                    @endforeach
                                    </select>

                                    <label for="">Tanggal Mulai dan Selesai</label>
                                    <div class="row ml-1 g-2 mb-4">
                                        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                              <input class="form-control" name="tanggal_mulai" value="{{ $pengalaman->tanggal_mulai }}" autofocus required type="text" />
                                              <span class="input-group-addon input-group-text">
                                                  <i class="bi bi-calendar-date"></i>
                                              </span>
                                          </div>

                                            <div id="datepicker2" class="input-group date ml-2"  data-date-format="mm-dd-yyyy">
                                              <input class="form-control" name="tanggal_selesai" value="{{ $pengalaman->tanggal_selesai }}" autofocus required type="text" />
                                              <span class="input-group-addon input-group-text">
                                                  <i class="bi bi-calendar-date"></i>
                                              </span>
                                          </div>
                                    </div>

                                        <div class="form-group">
                                            <textarea rows="3" class="form-control" id="deskripsi" style="border-radius: 8px;" name="deskripsi" required autofocus
                                                placeholder="Deskripsi Proyek">{{ $pengalaman->deskripsi }}</textarea>
                                        </div>


                                        <div class="mx-auto align-items-center text-center ">
  <div class="imgUp">
    <img class="imagePreview mb-2" src="{{ url('storage/tukang/pengalaman/'.$pengalaman->foto) }}" style="border-radius: 5px; float: left;" alt="">
    <div class="input-group">
     <input type="file" class="form-control uploadFile" id="foto" name="foto">
     <label class="input-group-text" for="foto">Perbarui Foto</label>
     </div>
</div>
</div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block mb-4" style="font-size: 11pt;">
                                            <strong>Perbarui Pengalaman</strong>
                                        </button>
                                
                                    </form>
                        </div>
                    </div>
                </div>
@endsection

@section('js')
<script type="text/javascript">
 $(function () {
            $("#datepicker").datepicker({ 
                autoclose: true, 
                todayHighlight: true,
                title: "Tanggal Mulai",
                // todayBtn : "linked",
            });

             $("#datepicker2").datepicker({ 
                autoclose: true, 
                todayHighlight: true,
                title: "Tanggal Selesai",
                // todayBtn : "linked",
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
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
@endsection