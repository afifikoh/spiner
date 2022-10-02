@extends('layout.main')

@section('judul')
<div class="content-header">
  <div class="container-fluid">
    <div class="col-sm-12">
    <div class="row mb-4">
        <h1 class="md-0">Data Kinerja Pegawai</h1>
        <div class="col box-header text-right">
            <a href="{{url('/draft')}}" class="btn btn-rounded btn-warning" style="border-radius:30px;">Draft</a>
            <a href="{{url('/tambah-kinerja')}}" class="btn btn-primary" style="border-radius:30px;"><i class="fa fa-plus-circle" ></i &nbsp> Tambah Kinerja</a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('isi')


<!-- /.content-header -->
<div class="container-fluid">
<div class="card">
    <!-- /.card-header -->
    {{-- <div class="card-header">
      <div class="row">
        <div class="col-sm-12">
          Table Data Pegawai
        </div>
      </div>
    </div> --}}
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
          <table id="dt-table" class="table table-bordered table-hover ">
            <thead>
            <tr>
              <th style="text-align:center">No</th>
              <th style="text-align:center">Tgl</th>
              <th style="text-align:center">Hasil Kinerja</th>
              <th style="text-align:center">Foto</th>
              <th style="text-align:center">PDF</th>
              <th style="text-align:center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            @foreach ($kinerja as $k)
            <tr class="odd">
                <td class="text-center">{{$no++}}</td>
                <td class="text-center">{{$k->tgl}}</td>
                <td class="text-center">{{$k->hasil}}</td>
                <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k['foto']) }}" class="btn btn-rounded btn-info style="border-radius:30px;""><i class="far fa-file-image"></i></a></td>
                <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k['doc']) }}" class="btn btn-rounded btn-info style="border-radius:30px;""><i class="far fa-file-pdf"></i></a></td>
                <td>
                <div class="d-grid gap-2 d-md-block" style="text-align:center">
                  <a href="/edit-kinerja-pegawai/{{ $k->id }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <a href="/pegawai-hapus/{{ $k->id }}" class="btn btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin hapus data?')"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
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
