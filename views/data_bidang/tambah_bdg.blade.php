@extends('layout.main')

@section('judul')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data Pegawai</h1>
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
                            <form action="bidang-add" method="POST">
                                @csrf
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="kd_dinas">Kode Dinas</label>
                                        <input type="text" name="kd_dinas" class="form-control" id="kd_dinas" value="96" readonly >
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="kd_dinas">Kode Bidang</label>
                                        <input type="text" name="kd_bidang" class="form-control" id="kd_bidang" placeholder="Masukan kode bidang" required>
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="bidang">Nama Bidang</label>
                                        <input type="text" name="bidang" class="form-control" id="bidang" placeholder="Masukan Nama Bidang" required>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    &nbsp;&nbsp;
                                    <button type="" class="btn btn-default float-sm">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection