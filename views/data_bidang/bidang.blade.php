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
                      <div class="row">
                        <div class="col-sm-12 col-md-9"></div>
                        {{-- <div class="col-sm-12 col-md-3">
                            <form action="" method="get">
                                <div class="col-sm-3">
                                  <div class="input-group mb-3" style="width: 240px;">
                                    <input type="text" name="keyword" class="form-control " placeholder="Search">
                                    <button type="submit" class="input-group-text btn btn-default "><i class="fas fa-search"></i></button>
                                  </div>
                                </div>
                              </form>
                        </div> --}}
                    </div>
                    
                    
                    <!-- /.card-header -->
                    <div class="row">
                      <div class="col-sm-12">
                      <table id="bidang" class="table table-bordered table-hover dataTable dtr-inline collapsed">
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
                          @php $no=1; @endphp
                          @foreach ($bidang as $data)
                          <tr class="odd">
                            
                            <td>{{ $no++ }}</td>
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
                      <div class="my-2">
                        {{ $bidang->links() }}
                      </div>
                    
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
{{-- </div>      --}}
@endsection
@push('main-script')
  <script>
    $('#bidang').dataTable();
  </script>
@endpush

