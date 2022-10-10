@extends('layout.main')

@section('judul')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
     <div class="col-sm-12">
       <div class="row mb-0">
         <h1 class="font-weight-bold">Ubah Profil</h1>
       </div><!-- /.col -->
     </div><!-- /.row -->
    </div><!-- /.container-fluid -->
   </div>
 <!-- /.content-header -->
 
 <!-- ISI CONTENT -->
 <div class="container-fluid">
     <div class="col-sm-12">
       <div class="card">
         {{-- <form> --}}
          <div class="col-lg-5">
            <div class="card-body">
              <form action="/update/profil/KepBidang/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                      <img src="{{ asset ('img-user/'.$user->foto) }}" alt="user-image" class="img-circle elevation-2" width="15%">
                      <a href="{{url('edit-foto-profil-KepBidang/{id}')}}">&nbsp;&nbsp;&nbsp;Ubah Foto Profil</a> {{-- <input type="file" class="form-control-file 
                      @error('foto')
                      is-invalid
                      @enderror" 
                      id="foto" name="foto">
                      @error('foto')
                          <div class='invalid-feedback'>
                              {{ $message }}
                          </div>
                      @enderror --}}
                  </div>
                  <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control
                      @error('nama')
                      is-invalid
                      @enderror"
                      name="nama" id="nama" value="{{ $user->nama }}">
                      @error('nama')
                          <div class='invalid-feedback'>
                              {{ $message }}
                          </div>
                      @enderror
                  </div>
                  <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control
                        @error('email')
                        is-invalid
                        @enderror" 
                        name="email" id="email" value="{{ $user->email }}">
                        @error('email')
                          <div class='invalid-feedback'>
                              {{ $message }}
                          </div>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control
                        @error('alamat')
                        is-invalid
                        @enderror" 
                        name="alamat" id="alamat" value="{{ $user->alamat }}">
                        @error('alamat')
                          <div class='invalid-feedback'>
                              {{ $message }}
                          </div>
                        @enderror
                  </div>
                  <div class="form-group">
                        <label for="no_hp">No Telp</label>
                        <input type="text" class="form-control
                        @error('no_hp')
                        is-invalid
                        @enderror" 
                        name="no_hp" id="no_hp" value="{{ $user->no_hp }}">
                        @error('no_hp')
                          <div class='invalid-feedback'>
                              {{ $message }}
                          </div>
                        @enderror
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{url('pengaturan')}}" class="btn btn-warning">Batal</a>
                  </div>
              </form>
            {{-- </form> --}}
            </div>
          </div>
       </div>
     </div>
 </div>
   
 <!-- ISI CONTENT -->
 @endsection