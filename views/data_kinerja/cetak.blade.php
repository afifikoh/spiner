<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ asset('template/dist/img/logo.png') }}">
  <title>Spiner</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
  <!-- DataTable-->
  <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/')}}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Daterange: -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
  <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">

<body>
    <div class="container-fluid">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <h5 align="center"><b>REKAP KEGIATAN HARIAN TENAGA AHLI</b></h5>
                    <h5 align="center"><b>DISKOMINFO KAB.CILACAP</b></h5><br>
                    <p><b>Nama    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;{{$nama}}</p>
                    <p><b>Bidang  &nbsp;&nbsp;&nbsp;:</b>&nbsp;{{$bidang}}</p>
                    <table class="table table-bordered table-hover ">
                        <tr>
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Tgl</th>
                            <th style="text-align:center">Rincian Kinerja</th>
                        </tr>
                    @if($cetakdata < 1)
                        <td style="text-align:center">-</td>
                        <td style="text-align:center">-</td>
                        <td style="text-align:center">Tidak ada data pada periode ini</td>
                    @else
                    @foreach ($kinerja as $k)
                    <tr>
                        <td style="text-align:center">{{ $loop->iteration }}</td>
                        <td style="text-align:center">{{ $k->tgl }}</td>
                        <td style="text-align:center">{{ $k->hasil }}</td>
                    </tr> 
                    @endforeach
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
