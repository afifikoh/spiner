@extends('layout.main')

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
                    <input type="text" id="tgl" name="tgl" class="form-control" readonly value="{{ date("d/m/Y") }}" data-target="#tgl" data-toggle="datetimepicker">
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
                  {{-- <img src="{{ template(img) }}" height="128"> --}}
                    <label for="foto">Bukti Foto</label><span class="text-danger">*</span>
                    <div class="input-group">
                      <input type="file" class="form-control 
                      @error('foto')
                      is-invalid
                      @enderror" id="foto" name="foto">
                      @error('foto')
                          <div class='invalid-feedback'>
                             {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="doc">Bukti Document (.pdf)</label><span class="text-danger">*</span>
                    <div class="input-group">
                      <input type="file" class="form-control '
                      @error('doc')
                      is-invalid
                      @enderror" id="doc" name="doc">
                      @error('doc')
                          <div class='invalid-feedback'>
                             {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <input hidden type="status" class="form-control" id="status" name="status" value="pending">
                  </div>   
                  <div class="float-right"> 
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-primary">
                        <input type="radio" name="status" id="option1" value="pending" onclick="return confirm('PEHATIAN! Silahkan cek terlebih dahulu. Karena data yang disubmit tidak bisa diubah dan hapus')"> Submit
                      </label>
                      <label class="btn btn-warning">
                        <input type="radio" name="status" id="option2" value="draft" onclick="return confirm('Simpan sebagai draft?')"> Draft
                      </label>
                      <button type="submit" class="btn btn-success">Simpan</button>
                      <a href="kinerja-pegawai"><i class="btn btn-light">Batal</i></a> 
                    </div> 
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
