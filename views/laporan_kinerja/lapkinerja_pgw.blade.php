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
          </form>
          <div class="col box-header text-right" style="float: right; ">
              <a class="btn btn-success btn-sm">&nbsp;&nbsp;&nbsp;<b>Print&nbsp;&nbsp;&nbsp;</b><p><i class="fa fa-print fa-1x"></i></p></a>
          </div><!-- /.col -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  
@endsection

@section('isi')
    
<div class="container-fluid">
   
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <table id="kinerja" class="table table-sm table-bordered table-hover dataTable dtr-inline " aria-describedby="example2_info">
            <thead>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Hari</th>
                <th style="text-align:center">Tgl</th>
                <th style="text-align:center">Hasil</th>
                <th style="text-align:center">Bukti</th>
            </thead>
            <tbody>
            <tr class="odd">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="even">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
          </table>
        </div>
    </div>
        </div>
        <!-- /.card-body -->
      </div>
</div>
</div>

      <!-- CONTENT -->
      @endsection
      <script>
        $('#kinerja').dataTable();
        </script>