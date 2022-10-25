@extends('layout.main', ['title'=>'Laporan Kinerja'])

@section('judul')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-11">
          <h1 class="md-0">Laporan Data Kinerja Pegawai</h1><br>
        </div>
      </div>
    </div>
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
              <div class="table table-responsive">
              <table id="dt_table" class="table table-bordered table-hover ">
            <thead>
              <tr>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Nama</th>
                <th style="text-align:center">Bidang</th>
                <th style="text-align:center">Cek  Kinerja</th>
                
              </tr>
            </thead>
            {{-- <tbody> --}}
              <tbody>
                @php $no=1; @endphp
                @foreach ($pgw as $data)
                <tr class="odd">
                  
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama }}</td>
                  <td>{{ $data->bidang }}</td>
                  <td>
                    <a href="/lapkinerja-admin/{{ $data->id }}">
                    <button type="button" class="btn btn-block btn-info btn-sm">Cek Kinerja</button>
                    </a>
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
 </div>
        <!-- /.card-body -->
</div>

      <!-- CONTENT -->
      @endsection