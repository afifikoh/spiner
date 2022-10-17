@extends('layout.main')

@section('judul')
<div class="content-header">  
    <div class="container-fluid">
      <div class="col-sm-12">
        <h1 class="md-0">Laporan Data Kinerja Pegawai</h1><br> 
          <div class="row">
            <div class="col box-header" style="">
              <a href="#" class="btn btn-success btn-filter"><i class="far fa-file-pdf"></i>&nbsp;&nbsp;&nbsp;<b>Print&nbsp;&nbsp;&nbsp;</b></a>
            </div><!-- /.col -->
          </div>
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
              <tbody>
                @php $no = 1; @endphp
                @foreach ($kinerja as $k)
                <tr class="odd">
                  <td class="text-center">{{$no++}}</td>
                  <td class="text-center">{{$k->tgl}}</td>
                  <td class="text-center">{{$k->hasil}}</td>
                  <td class="text-center">
                    <a href="{{ asset('template/dist/img/kinerja/'.$k['foto']) }}" class="btn btn-rounded btn-info" style="border-radius:30px;"><i class="far fa-file-image"></i></a>
                  </td>
                  <td class="text-center">
                  <a href="{{ asset('template/dist/img/kinerja/'.$k['doc']) }}" class="btn btn-rounded btn-info" style="border-radius:30px;"><i class="far fa-file-pdf"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
        <!-- /.card-body -->
</div>
<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content">
 
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Pilih Periode Tanggal</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
<div class="modal-body">
  <form role="form" target="__blank" enctype="multipart/form-data" action="{{url('cetak-kinerja')}}" method="get">
    <div class="box-body">
      <div class="form-group">
        <label for="date">Tanggal Awal</label>
        <input type="date" class="form-control"  name="tglAwal">
      </div>
      <div class="form-group">
        <label for="date">Tanggal Akhir</label>
        <input type="date" class="form-control" name="tglAkhir">
      </div>
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-success">Print</button>
      {{-- <a type="submit "class="btn btn-success">&nbsp;&nbsp;&nbsp;<b>Print&nbsp;&nbsp;&nbsp;</b></a> --}}

    </div>
  </form>

</div>
</div>
</div>
</div>

      <!-- CONTENT -->
      @endsection
