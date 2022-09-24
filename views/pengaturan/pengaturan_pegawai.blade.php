@extends('layout.main')

@section('judul')
<div class="content-header">
    <div class="container-fluid">
      <div class="col-sm-12">
        <div class="row mb-4">
          <h1 class="m-0">Pengaturan</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('isi')
<!-- ISI CONTENT -->
<div class="container-fluid">
  <div class="col-sm-12">
    <div class="card">
    <div class="card-header" class="text-center">
        <div class="row justify-content-md-center">
            <div class="col-md-4 col-sm-6 col-12"><br>
                <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="box-icon"><br><i class="fa-5x fas fa-user-edit"></i></span>
                        <span class="info-box-number">Profil Saya</span>
                        <span class="info-box-text">Ubah data diri kamu</span><br>
                        <a href="{{url ('/pegawai/edit-profil')}}" class="nav-link" style="text-align: center"> 
                          <button type="button" class="btn btn-warning rounded-pill">Ubah sekarang</button>
                        </a>
                    </div>
                </div><br>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-md-4 col-sm-6 col-12"><br>
                <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="box-icon"><br><i class="fa-5x fas fa-lock"></i></span>
                        <span class="info-box-number">Password Saya</span>
                        <span class="info-box-text">Ganti kata sandimu</span><br>
                        <a href="{{url ('/pegawai/edit-password/{id}')}}" class="nav-link" style="text-align: center"> 
                          <button type="button" class="btn btn-warning rounded-pill">Ubah sekarang</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>


<!-- ISI CONTENT -->
@endsection
