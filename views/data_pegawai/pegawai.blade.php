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

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="pegawai" class="table table-bordered table-hover dataTable dtr-inline collapsed" >
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
                                    @php $no=1; @endphp
                                    @foreach ($users as $data) 
                                    <tr class="odd">
                                        {{-- <td><img src="{{ asset ('asset/img/pegawai/'.$data['foto']) }}" alt="" class="img-fluid"></td> --}}
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data['nip'] }}</td>
                                        <td>{{ $data['nama'] }}</td>
                                        <td>{{ $data['alamat'] }}</td>
                                        <td>{{ $data['email'] }}</td>
                                        <td>{{ $data['no_hp'] }}</td>
                                        <td>{{ $data['level']}}</td>
                                        <td>{{ $data['bidang'] }}</td> 
                                        <td>
                                        <div class="d-grid gap-2 d-md-block" style="text-align:center">
                                            <a href="edit-pegawai/{{ $data->id }}">
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
                            <div class="my-2">
                                {{ $users->links() }}
                              </div>
                        </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('main-script')
  <script>
    $('#pegawai').dataTable();
  </script>
@endpush
    
@endsection