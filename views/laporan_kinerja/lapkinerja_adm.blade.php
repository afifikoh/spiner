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
      <div class="card-header">
        {{-- <form action="GET">
          <div class="col-sm-4">
          <div class="form-group">
              <label for="pegawai">Pegawai</label>
              <select name="nama" class="custom-select filter" id="filter-pegawai">
                  <option>- Pilih Pegawai -</option>
                  @foreach ($kinerja as $data)
                      <option value="{{ $data->id }}"> {{ $data->nama }} </option>
                  @endforeach
              </select>
          </div>
        </form> --}}
        
      </div>

      </div>
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
                <th style="text-align:center">Tgl</th>
                <th style="text-align:center">Rincian Kinerja</th>
                <th style="text-align:center">Doc</th>
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
                  <td>{{ $data->tgl }}</td>
                  <td>{{ $data->hasil }}</td>
                  
                  <td class="text-center">
                    <a href="{{ asset('template/dist/img/kinerja/'.$data->foto) }}" class="btn btn-rounded btn-info style="border-radius:30px;""><i class="far fa-file-image"></i></a>
                    <a href="{{ asset('template/dist/img/kinerja/'.$data->doc) }}" class="btn btn-rounded btn-info style="border-radius:30px;""><i class="far fa-file-pdf"></i></a>
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
