@extends('layout.main', ['title'=>'Edit Foto'])

@section('judul')
<div class="content-header">
    <div class="container-fluid">
     <div class="col-sm-12">
       <div class="row mb-0">
         <h1 class="font-weight-bold">Ubah Foto Profil</h1>
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
            <form action="/kepalabidang/update-foto/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6">
              <label for="foto">Bukti Foto</label>
                <div class="custom-file
                  @error('foto')
                    is-invalid
                  @enderror">
                    <input type="file" class="custom-file-input" name="foto" id="foto">
                    <label class="custom-file-label" for="foto">Choose file</label>
                  </div>
                    @error('foto')
                      <div class='invalid-feedback'>
                        {{ $message }}
                      </div>
                    @enderror
            </div>
            <script>
              // Add the following code if you want the name of the file appear on select
              $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
              });
            </script>
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{url('edit-profil-pegawai/{id}')}}" class="btn btn-warning">Batal</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection