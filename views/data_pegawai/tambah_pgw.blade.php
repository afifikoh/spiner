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
                            <form action="pegawai-add" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" name='nip' class="form-control" id="nip" placeholder="Masukan NIP" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" name='nik' class="form-control" id="nik" placeholder="Masukan NIK" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="kode_dinas">Kode Dinas</label>
                                            <input type="text" name='kode_dinas' class="form-control" id="kode_dinas" value="96" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bidang">Bidang</label>
                                            <select name="bidang" name='bidang' id="bidang" class="custom-select" placeholder="- Pilih Bidang -" required>
                                                <option>- Pilih Bidang -</option>
                                                @foreach ($bidang as $data)
                                                    <option value="{{ $data->id }}"> {{ $data->bidang }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukan Jabatan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" id="date" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select name="jk" class="custom-select" id="jk" placeholder="- Pilih Jenis Kelamin -" required>
                                                <option value="">- pilih Jenis Kelamin -</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="thn_masuk">Tahun Masuk</label>
                                            <input type="text" name="thn_masuk" class="form-control" placeholder="Masukan Tahun Masuk" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="bln_masuk">Bulan Masuk</label>
                                            <input type="text" name="bln_masuk" class="form-control" placeholder="Masukan Bulan Masuk" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="no_hp">No HP</label>
                                            <input type="text" name="no_hp" class="form-control" placeholder="Masukan No HP" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="pend_terakhir">Pendidikan Terakhir</label>
                                            <input type="text" name="pend_terakhir" class="form-control" placeholder="Masukan Pendidikan Terakhir" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Masukan Email" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" name="password" class="form-control" placeholder="Masukan Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="3" placeholder="Masukan Alamat" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select name="level" class="custom-select" placeholder="- Pilih Level -" required>
                                                <option>- pilih Level -</option>
                                                <option value="Kepala Bidang">Kepala Bidang</option>
                                                <option value="Sub koordiator">Sub Koordinator</option>
                                                <option value="Pegawai">Pegawai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="custome file">
                                                <label for="foto">Foto</label>
                                                <label> </label>
                                                
                                                <input type="file" class="form-control" name="foto">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-11">           
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="cancel" class="btn btn-default float-right">Batal</button>
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
@endsection