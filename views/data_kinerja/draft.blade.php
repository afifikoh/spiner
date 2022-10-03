@extends('layout.main')

@section('judul')
<div class="content-header">
  <div class="container-fluid">
    <div class="col-sm-12">
    <div class="row mb-4">
        <a href="kinerja-pegawai" class="btn btn-rounded btn-primary" style="border-radius:30px;"><i class="fas fa-arrow-left"></i></a>&nbsp;<h1 class="md-0">DRAFT</h1>
        <div class="col box-header text-right">
            {{-- <a href="#" class="btn btn-warning">Draft</a>
            <a href="{{url('/tambah-kinerja')}}" class="btn btn-primary"><i class="fa fa-plus-circle" ></i &nbsp> Tambah Kinerja</a> --}}
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
@endsection

@section('isi')

<!-- /.content-header -->
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered table-hover ">
                <thead>
                <tr>
                  <th style="text-align:center">No</th>
                  <th style="text-align:center">Tgl</th>
                  <th style="text-align:center">Rincian Kinerja</th>
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
                    <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k['foto']) }}" class="btn btn-rounded btn-info"><i class="far fa-file-image"></i></a></td>
                    <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k['doc']) }}" class="btn btn-rounded btn-info"><i class="far fa-file-pdf"></i></a></td>
                    <td>
                    <div class="d-grid gap-2 d-md-block" style="text-align:center">
                        {{-- <div class="d-grid gap-2 d-md-block" style="text-align:center"> --}}
                            {{-- <a href="#">
                            <button class="btn btn-warning" type="button"><i class="fas fa-edit"></i></button></a> --}}
                          <a href="/pegawai-hapus/{{ $k->id }}" class="btn btn-danger"><i class="fas fa-trash" onclick="return confirm('Yakin hapus data?')"></i></a>
                          <a href="/restore/{{ $k->id }}" class="btn btn-success" onclick="return confirm('Yakin ingin submit?')">Submit</a>
                    </div>
                  </td>
                </tr>
                @endforeach
                {{ $kinerja -> links() }}
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
