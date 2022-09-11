@extends('layout.main')

@section('judul')

<section class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Data Bidang</h1>
          </div>    
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <a href="{{ url('tambah-bidang') }}" class="nav-link">
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
                      <div class="col-sm-6">
                      <h3 class="card-title">Data List Bidang</h3>
                      </div>
                      <div class="col-sm-2 float-right">
                        <div class="input-group input-group-sm" style="width: 168px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                        </button>
                        </div>
                      </div>
                      </div>
                    </div>
                    
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      
                      <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Dinas</th>
                          <th>Kode Bidang</th>
                          <th>Nama Bidang</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($bidang as $data)
                          <tr class="odd">
                            
                            <td>{{ $data['id'] }}</td>
                            <td>{{ $data['kd_dinas'] }}</td>
                            <td>{{ $data['kd_bidang'] }}</td>
                            <td>{{ $data['bidang'] }}</td>
                            
                            <td>
                              <div class="d-grid gap-2 d-md-block" style="text-align:center">
                              <a href="edit-bidang/{{ $data->id }}">
                                  <button class="btn btn-warning" type="button"><i class="fas fa-edit"></i></button>
                              </a>
                              <a href="hapus-bidang/{{ $data->id }}">
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
              </div>
          </div>
      </div>
  </section>
{{-- </div>      --}}
@endsection

