@extends('layout.main')

@section('judul')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
     <div class="col-sm-12">
       <div class="row mb-0">
         <h1 class="font-weight-bold">Ubah Foto Profil</h1>
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
              <form action="/update/foto/profil/pegawai/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
<div class="form-group">
  <input type="file" class="form-control
  @error('foto')
  is-invalid
  @enderror" 
  id="foto" name="foto">
  @error('foto')
      <div class='invalid-feedback'>
          {{ $message }}
      </div>
  @enderror
</div>
<div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="{{url('edit-pegawai')}}" class="btn btn-warning">Batal</a>
</div>
</form>
</div>
</div>
</div>
     </div>
 </div>

@endsection