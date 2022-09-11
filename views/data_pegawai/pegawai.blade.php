@extends('layout.main')

@section('judul')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pegawai</h1>
                </div>    
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{ url('tambah-pegawai') }}" class="nav-link">
                    <button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data </button>
                    </a>
                </ol>
                </div>
            </div>
        </div>
    </section>
@endsection

 @section('isi')   
    <section class="content">
        <div class="container-fluid">
            <div class="row">    
                <div class="col-12">        
                    <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-12 col-md-10"></div>
                                    <div class="col-sm-12 col-md-2">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Level</th>
                                        <th>Bidang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $data) 
                                    <tr class="odd">
                                        {{-- <td><img src="{{ asset ('asset/img/pegawai/'.$data['foto']) }}" alt="" class="img-fluid"></td> --}}
                                        <td></td>
                                        <td>{{ $data['nip'] }}</td>
                                        <td>{{ $data['nama'] }}</td>
                                        <td>{{ $data['alamat'] }}</td>
                                        <td>{{ $data['email'] }}</td>
                                        <td>{{ $data['no_hp'] }}</td>
                                        <td>{{ $data['level']}}</td>
                                        <td>{{ $data['bidang'] }}</td> 
                                        <td>
                                        <div class="d-grid gap-2 d-md-block" style="text-align:center">
                                            <a href="{{ url('admin/edit/pegawai') }}">
                                            <button class="btn btn-warning" type="button"><i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="hapus-pegawai/{{ $data->id }}">
                                            <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                        </a>
                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-9">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-3 col-md-3" style="padding-left:20px;">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example2_previous">
                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                            </li>
                            <li class="paginate_button page-item ">
                                <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                            </li>
                            <li class="paginate_button page-item next" id="example2_next">
                                <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection