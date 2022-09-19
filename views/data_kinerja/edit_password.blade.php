@extends('layout.main')

@section('judul')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-0">
        <div class="col-sm-12">
          <h1 class="font-weight-bold">Ubah Password</h1>
          <span>Amankan akun Anda dengan kombinasi password yang baik</span>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
  <!-- ISI CONTENT -->
  <div class="container-fluid">
    <div class="col-sm-12">
  <div class="card" style="width: 25rem;">
      <div class="card-header">
          <form>
              <div class="form-group">
                  <div class="col-lg-15">
                      <label for="exampleFormControlInput1">Password baru</label>
                      <input type="nama" class="form-control" id="exampleFormControlInput1" placeholder="Password baru ..">
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-lg-15">
                      <label for="exampleFormControlInput1">Password baru</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ulangi Password baru ..">
                  </div><br>
                  <button type="button" class="btn btn-primary">Perbarui</button>
                  <a href="{{url('/pegawai/pengaturan')}}" class="btn btn-warning">Batal</a>
              </div>
          </form>
      </div>
  </div>
  </div>
  </div>
  </div>
  
  @endsection
  