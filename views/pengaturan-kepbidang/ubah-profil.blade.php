@extends('layout.main', ['title' => 'Ubah Profil - Kepala Bidang'])

@section('judul')
<div class="content-header">
  <div class="container-fluid">
    <div class="col-sm-12">
      <div class="row mb-0">
       <h1 class="font-weight-bold">Ubah Profil</h1>
      </div>
    </div>
  </div>
</div>
@endsection

@section('isi')
    <div class="container-fluid">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <form action="/kepalabidang/update-profil/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group"> 
              <img src="{{ asset ('img-user/'.$user->foto) }}" alt="User Image" class="img-circle elevation-2" width="15%" height="15%">
              <a href="{{url('ubah-foto/{id}')}}">Ubah Foto Profil</a>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" value="{{ $user->nama }}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control"
              name="alamat" id="alamat" value="{{ $user->alamat }}">
            </div>
            <div class="form-group">
              <label for="no_hp">No Telp</label>
              <input type="text" class="form-control"
              name="no_hp" id="no_hp" value="{{ $user->no_hp }}">
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{url('pengaturan-kepala')}}" class="btn btn-warning">Batal</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function simpan()
      {
        swal({
              title: "Berhasil!",
              text: "Berhasil Menyimpan Data!",
              icon: "success",
              button: true,
              timer: 2000,
              });
      }
     </script>
@endsection