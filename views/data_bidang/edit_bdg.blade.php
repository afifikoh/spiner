@extends('data_pegawai/panel')

@section('judul')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Data Bidang</h1>
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
                        <div class="card-body">
                            @foreach ($bidang as $data)
                            <form action="bidang-edit/{{ $data->id }}" method="POST">
                                
                                @method('PUT')
                                @csrf
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="kd_dinas">Kode Dinas</label>
                                        <input type="text" name="kd_dinas" class="form-control" id="kd_dinas" value="{{ $data->kd_dinas }}" readonly >
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="kd_dinas">Kode Bidang</label>
                                        <input type="text" name="kd_bidang" class="form-control" id="kd_bidang" value="{{ $data->kd_bidang }}" required>
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="bidang">Nama Bidang</label>
                                        <input type="text" name="bidang" class="form-control" id="bidang" value="{{ $data->bidang }}" required>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    &nbsp;&nbsp;
                                    <button type="cancel" class="btn btn-default float-sm">Batal</button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection