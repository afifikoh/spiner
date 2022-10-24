@extends('layout.main', ['title'=>'Kinerja Pegawai'])

@section('judul')
<div class="content-header">
  <div class="container-fluid">
    <div class="col-sm-12">
    <div class="row mb-4">
        <h1 class="md-0">Data Kinerja Pegawai</h1>
        <div class="col box-header text-right">
            {{-- <a href="{{url('/draft')}}" class="btn btn-rounded btn-warning" style="border-radius:30px;">Draft</a> --}}
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
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="table table-responsive">
            <table id="dt-table" class="table table-bordered table-hover ">
              <thead>
              <tr>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Tgl</th>
                <th style="text-align:center">Rincian Kinerja</th>
                <th style="text-align:center">Doc</th>
                <th style="text-align:center">Status</th>
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

                  @if($k->foto == null)
                    <td class="text-center">  
                    <a href="{{ asset('template/dist/img/kinerja/'.$k['doc']) }}" class="btn btn-rounded btn-info" style="border-radius:30px;"><i class="far fa-file-pdf"></i></a>
                    </td>
                  
                  @else
                  <td class="text-center">
                    <a href="{{ asset('template/dist/img/kinerja/'.$k['foto']) }}" class="btn btn-rounded btn-info" style="border-radius:30px;"><i class="far fa-file-image"></i></a>
                    <a href="{{ asset('template/dist/img/kinerja/'.$k['doc']) }}" class="btn btn-rounded btn-info" style="border-radius:30px;"><i class="far fa-file-pdf"></i></a>
                  </td> 
                  @endif
                  
                  @if ($k->status == 'pending')
                    <td class="text-center">
                      <div class="badge {{ $k->status == "pending" ? "badge-warning" : "badge-success" }}">{{ $k->status }}</div></td>
                    </td>
                  @else
                    <td class="text-center">
                      <span class="badge bg-danger">{{ $k->status }}</span>
                    </td>
                  @endif  
                  @if ($k->status == 'draft')
                    <td>
                      <div class="d-grid gap-2 d-md-block" style="text-align:center">
                        <a href="edit-draft/{{ $k->id }}" class="btn btn-warning"style="border-radius:30px;"><i class="fas fa-edit"></i></a>
                        <a href="/pegawai/hapus/{{ $k->id }}" class="btn btn-danger" style="border-radius:30px;"><i class="fas fa-trash" onclick="return confirm('Yakin hapus data?')"></i></a>
                        <a href="/restore/{{ $k->id }}" class="btn btn-success" style="border-radius:30px;" onclick="return confirm('PEHATIAN! Silahkan cek terlebih dahulu. Karena data yang disubmit tidak bisa diubah dan hapus')">Submit</a>
                      </div>
                    </td>
                  @else
                    <td>
                      <div class="d-grid gap-2 d-md-block" style="text-align:center">
                        <div class="btn btn-warning disabled" style="border-radius:30px;"><i class="fas fa-edit"></i></div>
                        <div class="btn btn-danger disabled" style="border-radius:30px;"><i class="fas fa-trash"></i></div>
                        <div class="btn btn-success disabled" style="border-radius:30px;">Submit</div>
                      </div>
                    </td>
                  @endif
                    
              </tr>
              @endforeach
            </tbody>
            </table>
          </div>
    </div>
</div>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div>
  <!-- CONTENT -->
  @endsection
