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
                {{-- @isset($message)
                    <div class="alert alert-success">
                    <strong>{{$message}}</strong>
                    </div>
                @endif --}}
                <div class="card-body">
                  @csrf
                  <div class="form-group col-md-2">
                    <label for="tgl">Tanggal</label><span class="text-danger">*</span>
                    <input type="text" id="tgl" name="tgl" class="form-control" readonly value="{{ date("d/m/Y") }} " data-target="#tgl" data-toggle="datetimepicker">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="hasil">Hasil Kinerja</label><span class="text-danger">*</span>
                    <textarea class="form-control" id="hasil" name="hasil" rows="4" placeholder="Masukkan Hasil Kinerja"></textarea>
                  </div>
                  <div class="form-group col-md-5">
                  {{-- <img src="{{ template(img) }}" height="128"> --}}
                    <label for="foto">Bukti Foto</label><span class="text-danger">*</span>
                    <div class="input-group">
                      <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="doc">Bukti Document (.pdf)</label><span class="text-danger">*</span>
                    <div class="input-group">
                      <input type="file" class="form-control" id="doc" name="doc">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="float-right">
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin simpan?')">Simpan</button>
                    <a href="{{url('/pegawai/kinerja-pegawai')}}" class="btn btn-warning">Batal</a>
                  </div>
                </div>
              </form>
            </div>
            </div>
          </div>
    </div>
  </div>
</div>
<!-- /.card -->
<!-- /.content-wrapper -->
@endsection