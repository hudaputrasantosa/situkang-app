@extends('pelanggan.layout')

@section('content')
           <div class="container-fluid">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="https://t3.ftcdn.net/jpg/05/00/54/28/360_F_500542898_LpYSy4RGAi95aDim3TLtSgCNUxNlOlcM.jpg"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white mt-2">{{ $pelanggan->nama }}</h4>
                                        <h5 class="text-white mt-2">{{ $pelanggan->no_telepon }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nama Lengkap</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{ $pelanggan->nama }}"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Tempat Lahir</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{ $pelanggan->tempat_lahir }}"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                     <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Tanggal Lahir</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{ $pelanggan->tanggal_lahir }}"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                     <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Jenis Kelamin</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{ $pelanggan->jenis_kelamin }}"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Kecamatan</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option>{{ $pelanggan->kecamatan }}</option>                                         
                                            </select>
                                        </div>
                                    </div>
                                 <div class="form-group mb-4">
                                        <label class="col-sm-12">Desa</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option>{{ $pelanggan->desa }}</option>                                         
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" placeholder="johnathan@admin.com"
                                                class="form-control p-0 border-0" name="example-email"
                                                id="example-email">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" value="password" class="form-control p-0 border-0">
                                        </div>
                                    </div> --}}
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">No Telepon</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" value="{{ $pelanggan->no_telepon }}"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Alamat</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea rows="3" class="form-control p-0 border-0">{{ $pelanggan->alamat }}</textarea>
                                        </div>
                                    </div>
                                
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
@endsection