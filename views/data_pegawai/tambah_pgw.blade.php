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
                                            <input type="text" name='nip' class="form-control
                                            @error('nip')
                                                is-invalid
                                            @enderror
                                            " id="nip" placeholder="Masukan NIP" value="{{ old('nip') }}" >
                                            @error('nip')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" name='nik'autocomplete="off" class="form-control
                                            @error('nik')
                                                is-invalid
                                            @enderror
                                            " id="nik" placeholder="Masukan NIK" value="{{ old('nik') }}">
                                            @error('nik')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                            <select name="bidang" class="custom-select
                                            @error('bidang')
                                            is-invalid
                                            @enderror " id="bidang" placeholder="- Pilih Bidang -" value="{{ old('bidang') }}">
                                                <option>- Pilih Bidang -</option>
                                                @foreach ($bidang as $data)
                                                    <option value="{{ $data->id }}"> {{ $data->bidang }} </option>
                                                @endforeach
                                            </select>
                                            @error('bidang')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" autocomplete="off" class="form-control
                                            @error('nama')
                                            is-invalid
                                            @enderror
                                            " id="nama" placeholder="Masukan Nama" value="{{ old('nama') }}" >
                                            @error('nama')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" name="jabatan" autocomplete="off" class="form-control
                                            @error('jabatan')
                                            is-invalid
                                            @enderror
                                            " id="jabatan" placeholder="Masukan Jabatan" value="{{ old('jabatan') }}">
                                            @error('jabatan')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" id="date" class="form-control
                                            @error('tgl_lahir')
                                            is-invalid
                                            @enderror
                                            " placeholder="" value="{{ old('tgl_lahir') }}">
                                            @error('tgl_lahir')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select name="jk" class="custom-select
                                            @error('jk')
                                            is-invalid
                                            @enderror
                                            " id="jk" placeholder="- Pilih Jenis Kelamin -" value="{{ old('jk') }}">
                                                <option value="">- pilih Jenis Kelamin -</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jk')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div>
                                            <label for="tahun-masuk">Tahun Masuk</label>
                                              <select name="tahun" class="form-control">
                                                <option selected="selected">~ Pilih Tahun Masuk ~</option>
                                                <?php for ($i = date("Y"); $i >= date("Y") - 32; $i -= 1) {
                                                    echo "<option value='$i'> $i </option>";
                                                } ?>
                                                </select>
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                        {{-- <div class="form-group">
                                            <label for="bln_masuk">Bulan Masuk</label>
                                            <input type="text" name="bln_masuk" class="form-control" placeholder="Masukan Bulan Masuk" required>
                                            
                                        </div> --}}
                                        <div>
                                            <label for="bulan-masuk">Bulan Masuk</label>
                                            <select name="bulan" class="form-control">
                                              <option selected="selected">~ Pilih Bulan Masuk ~</option>
                                              <?php
                                              $bln = [
                                                  1 => "Januari",
                                                  "Februari",
                                                  "Maret",
                                                  "April",
                                                  "Mei",
                                                  "Juni",
                                                  "Juli",
                                                  "Agustus",
                                                  "September",
                                                  "Oktober",
                                                  "November",
                                                  "Desember",
                                              ];
                                              for ($bulan = 1; $bulan <= 12; $bulan++) {
                                                  if ($bulan <= 9) {
                                                      echo "<option value='0$bulan'>$bln[$bulan]</option>";
                                                  } else {
                                                      echo "<option value='$bulan'>$bln[$bulan]</option>";
                                                  }
                                              }
                                              ?>
                                              </select>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="no_hp">No HP</label>
                                            <input type="text" name="no_hp" autocomplete="off" class="form-control
                                            @error('no_hp')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan No HP" value="{{ old('no_hp') }}" >
                                            @error('no_hp')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="pend_terakhir">Pendidikan Terakhir</label>
                                            <input type="text" name="pend_terakhir" autocomplete="off" class="form-control
                                            @error('pend_terakhir')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan Pendidikan Terakhir" value="{{ old('pend_terakhir') }}" >
                                            @error('pend_terakhir')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" autocomplete="off" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan Email" value="{{ old('email') }}" >
                                            @error('email')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" name="password" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan Password" value="{{ old('password') }}">
                                            @error('password')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" autocomplete="off" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                            " rows="3" placeholder="Masukan Alamat" value="{{ old('alamat') }}">
                                            </textarea>
                                            @error('alamat')
                                            <div class='invalid-feedback'>
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="level">Level</label>
                                            <select name="level" class="custom-select 
                                            @error('level')
                                            is-invalid
                                            @enderror
                                            " id="level" placeholder="- Pilih Level -" value="{{ old('level') }}" >
                                                <option>- pilih Level -</option>
                                                <option value="kepala-bidang">kepala Bidang</option>
                                                <option value="sub-koordiator">Sub Koordinator</option>
                                                <option value="pegawai">Pegawai</option>
                                            </select>
                                            @error('level')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="custome file @error('foto')
                                            is-invalid
                                            @enderror">
                                                <label for="foto">Foto</label>
                                                <label> </label>
                                                
                                                <input type="file" class="form-control " name="foto">
                                                
                                            </div>
                                            @error('level')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
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