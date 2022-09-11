@extends('data_pegawai/panel')

@section('content')

<div class="content-wrapper" style="min-height: 2080.12px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Data Pegawai</h1>
                </div>    
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
         <div class="row">    
            <div class="col-12">        
                <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control" placeholder="Masukan NIP" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" placeholder="Masukan NIK">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Kode Dinas</label>
                                            <input type="text" class="form-control" placeholder="96" disabled="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Bidang</label>
                                            <select class="custom-select" placeholder="- Pilih Bidang -">
                                                <option>- Pilih Bidang -</option>
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="custom-select" placeholder="- Pilih Jabatan -">
                                                <option>- Pilih Jabatan -</option>
                                                <option> </option>
                                                <option> </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" id="date" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Tahun Masuk</label>
                                            <input type="text" class="form-control" placeholder="Masukan Tahun Masuk" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Bulan Masuk</label>
                                            <input type="text" class="form-control" placeholder="Masukan Bulan Masuk">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="custom-select" placeholder="- Pilih Jenis Kelamin -">
                                                <option>- pilih Jenis Kelamin -</option>
                                                <option>Laki-laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Pendidikan Terakhir</label>
                                            <input type="text" class="form-control" placeholder="Masukan Pendidikan Terakhir">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" placeholder="Masukan Email" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" class="form-control" placeholder="Masukan Password" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="custom-select" placeholder="- Pilih Level -">
                                                <option>- pilih Level -</option>
                                                <option>Kepala Bidang</option>
                                                <option>Sub Koordinator</option>
                                                <option>Pegawai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" placeholder="Masukan Alamat"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="custome file">
                                                <label>Foto</label>
                                                <label> </label>
                                                <form action="aksi.php" method="post" enctype="multipart/form-data">
                                                <input type="file" class="form-control" name="file">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-11">           
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" class="btn btn-default float-right">Batal</button>
                                    </div>
                                </div>   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
@endsection