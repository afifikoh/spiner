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
                    <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data </button>
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
                                </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dt_table" class="table table-bordered table-hover dataTable dtr-inline collapsed" >
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
                                <tbody id="bd_pegawai">
                                    @php $no=1; @endphp
                                    @foreach ($users as $data) 
                                    <tr class="odd">
                                        
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data['nip'] }}</td>
                                        <td>{{ $data['nama'] }}</td>
                                        <td>{{ $data['alamat'] }}</td>
                                        <td>{{ $data['email'] }}</td>
                                        <td>{{ $data['no_hp'] }}</td>
                                        <td>{{ $data['level']}}</td>
                                        <td>{{ $data->nmbidang->bidang }}</td> 
                                        {{-- <td><img src="{{ asset ('img-user/'.$data['foto']) }}" alt="user-image" class="img-fluid"></td> --}}
                                        <td>
                                        <div class="d-grid gap-2 d-md-block" style="text-align:center">
                                            <a href="edit-pegawai/{{ $data->id }}">
                                            <button class="btn btn-warning" type="button"><i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="hapus-pegawai/{{ $data->id }}">
                                            <button class="btn btn-danger" type="button"><i class="fa fa-trash"></i></button>
                                        </a>
                                        <a href="get-pegawai/{{ $data->id }}">
                                            <button class="btn btn-primary" type="button"><i class="fa fa-eye"></i></button>
                                        </a>


                                        {{-- benar --}}
                                        {{-- <button class="btn btn-primary detail" type="button"  data-id="{{ $data->id; }}"><i class="fa fa-eye"></i></button> --}}
                                        
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
    <div class="modal-dialog modal-lg" id="modal-pegawai">...</div>
    
@endsection
