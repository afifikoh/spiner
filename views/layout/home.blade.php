@extends('layout.main')

@section('judul')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Beranda</h1>
            </div>    
        </div>
    </div>
</section>
@endsection

@section('isi')
@if ($user->level == 'administrator')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-green">
                <div class="inner">
                    <h1>3</h1>
                    <p>Data Pegawai</p>
                </div>
                <div class="icon">
                    <i class="ion fa fa-users"></i>
                </div>
                <a href="{{ url('pegawai') }}" class="small-box-footer"
                    ><strong>Selengkapnya </strong> <i class="fas fa-arrow-circle-right"></i
                ></a>
            </div>
        </div>
  
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-fuchsia">
                <div class="inner">
                    <h1>5</h1>
                    <p>Bidang</p>
                </div>
                <div class="icon">
                    <i class="ion fa fa-shapes"></i>
                </div>
                <a href="{{ url('bidang') }}" class="small-box-footer"
                    ><strong>Selengkapnya </strong> <i class="fas fa-arrow-circle-right"></i
                ></a>
            </div>
        </div>
  
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-cyan">
                <div class="inner">
                    <h1>2</h1>
                    <p>Laporan</p>
                </div>
            <div class="icon">
                <i class="ion fa fa-file-alt"></i>
            </div>
            <a href="{{ url('laporan-pegawai-admin') }}" class="small-box-footer"
                ><strong>Selengkapnya </strong> <i class="fas fa-arrow-circle-right"></i
            ></a>
        </div>
    </div>
</div>

@elseif($user->level == 'pegawai')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-purple">
                <div class="inner">
                    <h1>{{$hasilkinerja}}</h1>
                    <p>Kinerja Pegawai</p>
                </div>
                <div class="icon">
                    <i class="ion fa fa-list-ol"></i>
                </div>
                <a href="{{ url('kinerja-pegawai') }}" class="small-box-footer"
                    ><strong>Selengkapnya </strong> <i class="fas fa-arrow-circle-right"></i
                ></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-maroon">
                <div class="inner">
                    <h1>10</h1>
                    <p>Laporan</p>
                </div>
                <div class="icon">
                    <i class="ion fa fa-file-alt"></i>
                </div>
                <a href="{{ url('laporan-pegawai') }}" class="small-box-footer"
                    ><strong>Selengkapnya </strong><i class="fas fa-arrow-circle-right"></i
                ></a>
            </div>
        </div>
    </div>
</div>

@elseif($user->level == 'sub-koordinator')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-blue">
                <div class="inner">
                    <h1>4</h1>
                    <p>Kinerja Pegawai</p>
                </div>
                <div class="icon">
                    <i class="ion fa fa-list-ol"></i>
                </div>
                <a href="{{ url('kinerja-koordinator') }}" class="small-box-footer"
                    ><strong>Selengkapnya </strong> <i class="fas fa-arrow-circle-right"></i
                ></a>
            </div>
        </div>
    </div>
</div>

@elseif($user->level == 'kepala-bidang')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h1>4</h1>
                    <p>Kinerja Pegawai</p>
                </div>
                <div class="icon">
                    <i class="ion fa fa-list-ol"></i>
                </div>
                <a href="{{ url('kinerja-kepala') }}" class="small-box-footer"
                    ><strong>Selengkapnya </strong> <i class="fas fa-arrow-circle-right"></i
                ></a>
            </div>
        </div>
    </div>
</div>

@endif

@endsection
