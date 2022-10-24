@extends('layout.main', ['title'=>'Tambah Kinerja'])

@section('judul')
<div class="content-header">
    <div class="container-fluid">
      <div class="col-sm-12">
        <div class="row mb-0">
          <h1 class="md-0">Tambah Data Kinerja Pegawai</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div>
    </div>
@endsection

@section('isi')
<!-- Content Header (Page header) --> 
    
  <!-- /.content-header -->              
<!-- form start -->
<div class="container-fluid">
  <div class="col-sm-12">
    <div class="card">
              <form action="kinerja-add" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  @csrf
                  
                  <div class="form-group col-md-2">
                    <label for="tgl">Tanggal</label><span class="text-danger">*</span>
                    <input type="text" id="tgl" name="tgl" class="form-control
                    @error('tgl')
                    is-invalid
                    @enderror" readonly value="{{ date("d/m/Y") }}" data-target="#tgl" data-toggle="datetimepicker">
                    @error('tgl')
                      <div class='invalid-feedback'>
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group col-md-5">
                    <label for="hasil">Rincian Kinerja</label><span class="text-danger">*</span>
                    <textarea class="form-control 
                    @error('hasil')
                    is-invalid
                    @enderror" id="hasil" name="hasil" rows="4" placeholder="Masukkan Rincian Kinerja"></textarea>
                    @error('hasil')
                      <div class='invalid-feedback'>
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group col-md-5">
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
  <div class="form-group col-md-5">
    <label for="doc">Bukti Document</label><span class="text-danger">*</span>
        <div class="custom-file
            @error('doc')
                is-invalid
            @enderror">
              <input type="file" class="custom-file-input" name="doc" id="doc">
              <label class="custom-file-label" for="doc">Choose file</label>
        </div>
            @error('doc')
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
                    <input hidden type="status" class="form-control" id="status" name="status" value="pending">
                  </div>   
                 <div class="form-group">
                  <div class="float-left form-check">
                    <label class="btn btn-primary">
                      <input type="radio" name="status" id="status" name="status" id="option1" value="pending" class="form-input" onclick="return confirm('PERHATIAN! Silahkan cek terlebih dahulu. Karena data yang disubmit tidak bisa diubah dan hapus')" required> Submit
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="status" id="option2" value="draft" class="form-input" onclick="return confirm('Simpan sebagai draft?')" required> Draft
                    </label>
                  </div>
                </div>
                  <div class="float-right"> 
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="kinerja-pegawai"><i class="btn btn-light">Batal</i></a> 
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            </div>
          </div>
<!-- /.card -->
<!-- /.content-wrapper -->
@endsection
