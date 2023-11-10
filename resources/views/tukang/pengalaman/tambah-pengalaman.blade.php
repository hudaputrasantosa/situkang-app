@extends('layouts.navbar-dashboard')
@section('content')
  <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Pengalaman</h1>
                    </div>
                    {{ Breadcrumbs::render('tambah-pengalaman') }}

                       <div class="card shadow mb-4">
                        <div class="card-body mx-auto col-md-8">
                            <div class="py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pengalaman Project</h6>
                        </div>
                               <form class="user" method="POST" action="{{ route('tukang.pengalaman.store') }}" enctype="multipart/form-data">
                                @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="nama_proyek" name="nama_proyek" required autofocus
                                                placeholder="Nama proyek | contoh : pembangunan rumah kos, perbaikan tembok">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="alamat" name="alamat" required autofocus
                                                placeholder="Alamat proyek">
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
                                              <input class="form-control" name="tanggal_mulai" autofocus required type="text" />
                                              <span class="input-group-addon input-group-text">
                                                  <i class="bi bi-calendar-date"></i>
                                              </span>
                                          </div>

                                            <div id="datepicker2" class="input-group date ml-2"  data-date-format="mm-dd-yyyy">
                                              <input class="form-control" name="tanggal_selesai" autofocus required type="text" />
                                              <span class="input-group-addon input-group-text">
                                                  <i class="bi bi-calendar-date"></i>
                                              </span>
                                          </div>
                                    </div>

                                        <div class="form-group">
                                            <textarea rows="3" class="form-control" id="deskripsi" style="border-radius: 8px;" name="deskripsi" required autofocus
                                                placeholder="Deskripsi Proyek"></textarea>
                                        </div>

                                         <div class="input-group mb-4">
                                        <input type="file" class="form-control" id="foto" name="foto">
                                        <label class="input-group-text" for="foto">Upload</label>
                                        </div>
     
                                        <button type="submit" class="btn btn-primary btn-user btn-block mb-4" style="font-size: 11pt;">
                                            <strong>Tambah Pengalaman</strong>
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
            }).datepicker('update', new Date());

             $("#datepicker2").datepicker({ 
                autoclose: true, 
                todayHighlight: true,
                title: "Tanggal Selesai",
                // todayBtn : "linked",
            }).datepicker('update', new Date());
        });
</script>
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
@endsection