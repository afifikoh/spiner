@extends('layout.main')

@section('judul')
<div class="content-header">
    <div class="container-fluid">
      <div class="col-sm-11">
          <h1 class="md-0">Laporan Data Kinerja Pegawai</h1><br>
          <form>
                      <div class="form-row">
                          <div class="form-group col-md-2">
                              <label for="tglawal">Tanggal Awal</label>
                              <input type="date" class="form-control" id="tglawal">
                          </div>
                          &nbsp;<a style="padding-top: 40px">s/d</a>&nbsp;
                          <div class="form-group col-md-2">
                              <label for="tglakhir">Tanggal Akhir</label>
                               <input type="date" class="form-control" id="tglakhir">
                          </div>
                          <div class="form-group col-md-2" style="padding-top: 40px;">           
                            <button type="submit" class="btn btn-primary">Tampilkan</button>
                         </div>
          </form>
          <div class="col box-header text-right" style="float: right; ">
              <a class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;<b>Export PDF&nbsp;&nbsp;&nbsp;</b><p><i class="far fa-file-pdf"></i></p></a>
          </div><!-- /.col -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  
@endsection

@section('isi')
    
<div class="container-fluid">
   
        <!-- /.card-header -->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <table id="dt-table" class="table table-bordered table-hover ">
            <thead>
              <tr>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Tgl</th>
                <th style="text-align:center">Hasil</th>
                <th style="text-align:center">Foto</th>
                <th style="text-align:center">Doc</th>
              </tr>
            </thead>
            {{-- <tbody> --}}
          </table>
        </div>
    </div>
        </div>
      </div>
    </div>
        <!-- /.card-body -->
      </div>

      <!-- CONTENT -->
      @endsection
