@extends('layout.main', ['title' => 'Kinerja Terverifikasi'])

@section('judul')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-sm-11">
                <h1 class="md-0"><strong>Laporan Data Kinerja Pegawai</strong></h1><br>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="tglawal">Tanggal Awal</label>
                            <input type="date" class="form-control" id="tglawal">
                        </div>
                        &nbsp;
                        <a style="padding-top: 40px">s/d</a>
                        &nbsp;
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="dt-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td style="text-align:center">No</td>
                                    <td style="text-align:center">Hari</td>
                                    <td style="text-align:center">Tanggal</td>
                                    <td style="text-align:center">Hasil</td>
                                    <td style="text-align:center">Bukti Foto</td>
                                    <td style="text-align:center">Bukti Doc</td>
                                    <td style="text-align:center">Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($kinerja as $k)
                                <tr>
                                    <td class="text-center">{{ $no++ }}</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">{{ $k->tgl }}</td>
                                    <td class="text-center">{{ $k->hasil }}</td>
                                    <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k->foto) }}" class="btn btn-rounded btn-info"><i class="far fa-file-image"></i></a></td>
                                    <td class="text-center"><a href="{{ asset('template/dist/img/kinerja/'.$k->doc) }}" class="btn btn-rounded btn-info"><i class="far fa-file-pdf"></i></a></td>
                                    <td class="text-center"><div class="badge badge-success">{{ $k->status }}</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection