@extends('layout.main')

@section('judul')
<div class="content-header">
    <div class="container-fluid">
      <div class="col-sm-12">
          <h1 class="md-0">Laporan Data Kinerja Pegawai</h1><br> 
          <form action="tampilkan" method="POST">
                      <div class="form-row">
                          <div class="form-group col-md-2">
                              <label for="tglawal">Tanggal Awal</label>
                              <input type="date" class="form-control" id="tglawal" name="tglAwal">
                          </div>
                          &nbsp;<a style="padding-top: 40px">s/d</a>&nbsp;
                          <div class="form-group col-md-2">
                              <label for="tglakhir">Tanggal Akhir</label>
                               <input type="date" class="form-control" id="tglakhir" name="tglAkhir">
                          </div>
                          <div class="form-group col-md-2" style="padding-top: 31px;">           
                            <button type="submit" class="btn btn-primary" name="tampilkan">Tampilkan</button>
                         </div>
          </form>
         <div class="col box-header text-right" style="float: right; padding-top: 31px;">
              <a class="btn btn-warning">&nbsp;&nbsp;&nbsp;<b>Export PDF&nbsp;&nbsp;&nbsp;</b><i class="far fa-file-pdf"></i></a>
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

      <!-- CONTENT -->
      @endsection
