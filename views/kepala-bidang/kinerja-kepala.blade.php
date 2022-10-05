@extends('layout.main', ['title' => 'Pending - Kinerja Pegawai'])

@section('judul')
<div class="content-header">
  <div class="container-fluid">
    <div class="col-sm-12">
    <div class="row mb-4">
        <h1 class="md-0">Data Kinerja Pegawai</h1>
    </div>
  </div>
</div>
@endsection

@section('isi')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12">
          <table id="dt-table" class="table table-bordered table-hover ">
            <thead>
              <tr>
                <th style="text-align:center">No</th>
                <th style="text-align:center">Tanggal</th>
                <th style="text-align:center">Nama</th>
                {{-- <th style="text-align:center">Bidang</th> --}}
                <th style="text-align:center">Hasil</th>
                <th style="text-align:center">Bukti Foto</th>
                <th style="text-align:center">Bukti Dokumen</th>
                <th style="text-align:center">Status</th>
                <th style="text-align:center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1; @endphp
              @foreach ($pending_kinerja as $k)
                <tr class="odd">
                    <td class="text-center">{{$no++}}</td>
                    <td class="text-center">{{$k->tgl}}</td>
                    <td class="text-center">{{$k->nama}}</td>
                    {{-- <td class="text-center">{{$k->bidang}}</td> --}}
                    <td class="text-center">{{$k->hasil}}</td>
                    <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k->foto) }}" class="btn btn-rounded btn-info"><i class="far fa-file-image"></i></a></td>
                    <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k->doc) }}" class="btn btn-rounded btn-info"><i class="far fa-file-pdf"></i></a></td>
                    <td class="text-center"><div class="badge {{ $k->status == "pending" ? "badge-warning" : "badge-success" }}">{{ $k->status }}</div></td>
                    <td class="text-center">
                      <form action="/kepala-bidang/ubah/{{ $k->id }}" method="POST">
                        {{ csrf_field() }}
                          <button class="btn btn-sm btn-success" type="submit" name="changeStatus" value="success">Verifikasi</button>
                        </div>
                      </form>
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
@endsection