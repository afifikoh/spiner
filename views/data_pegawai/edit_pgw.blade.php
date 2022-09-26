@extends('layout.main')

@section('judul')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Pegawai</h1>
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
                            <form action="/pegawai/update/{{ $users->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" name='nip' class="form-control
                                            @error('nip')
                                                is-invalid
                                            @enderror
                                            " id="nip" value="{{ $users->nip }}" readonly>
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
                                            <input type="text" name='nik' class="form-control
                                            @error('nik')
                                                is-invalid
                                            @enderror
                                            " id="nik" value="{{ $users->nik }}">
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
                                            <input type="text" name='kode_dinas' class="form-control" id="kode_dinas" value="{{ $users->kode_dinas }}" readonly>
                                        </div>
                                    </div> 
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="bidang">Bidang</label>
                                            <select name="bidang" class="custom-select
                                            @error('bidang')
                                            is-invalid
                                            @enderror " id="bidang" placeholder="- Pilih Bidang -" >
                                                <option value="{{ $users->nmbidang->id }}">{{ $users->nmbidang->bidang }}</option>
                                                @foreach ($bidang as $data)
                                                    <option value="{{ $data->id }}">{{ $data->bidang }}</option>
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
                                            <input type="text" name="nama" class="form-control
                                            @error('nama')
                                            is-invalid
                                            @enderror
                                            " id="nama"  value="{{ $users->nama }}" >
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
                                            <input type="text" name="jabatan" class="form-control
                                            @error('jabatan')
                                            is-invalid
                                            @enderror
                                            " id="jabatan" value="{{ $users->jabatan }}" >
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
                                            <input type="text" name="tgl_lahir" id="tgl_lahir" autocomplete="off" class="date form-control
                                            @error('tgl_lahir')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan Tanggal Lahir" value="{{ old('tgl_lahir') }}">
                                            
                                            @error('tgl_lahir')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <script type="text/javascript">
                                            $('.date').datepicker({  
                                               format: 'yyyy mm dd'
                                             });  
                                        </script> 
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="jk">Jenis Kelamin</label>
                                            <select name="jk" class="custom-select
                                            @error('jk')
                                            is-invalid
                                            @enderror
                                            " id="jk" placeholder="- Pilih Jenis Kelamin -">
                                                <option  value="{{ $users->jk }}">{{ $users->jk }}</option>
                                                @if ($users->jk == "Laki-laki")
                                                    <option value="Perempuan">Perempuan</option>
                                                @else
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    
                                                @endif
                                            </select>
                                            @error('jk')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="thn_masuk">Tahun Masuk</label>
                                              <select name="thn_masuk" class="form-control @error('thn_masuk')
                                              is-invalid
                                              @enderror">
                                                <option value="{{ $users->thn_masuk }}" selected="selected">{{ $users->thn_masuk }}</option>
                                                <?php for ($i = date("Y"); $i >= date("Y") - 32; $i -= 1) {
                                                    echo "<option value='$i'> $i </option>";
                                                } ?>
                                                </select>
                                            @error('thn_masuk')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        
                                        <div class="form-group">
                                            <label for="bln_masuk">Bulan Masuk</label>
                                            {{-- <select name="bln_masuk" class="custom-select 
                                            @error('bln_masuk')
                                            is-invalid
                                            @enderror
                                            " id="bln_masuk" placeholder="- Pilih Bulan Masuk -" value="{{ $users->bln_masuk }}" >
                                                <option value="{{ $users->bln_masuk }}">{{ $users->bln_masuk }}</option>              
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select> --}}
                                            <select name="bln_masuk" class="form-control @error('bln_masuk')
                                            is-invalid
                                            @enderror">
                                              <option value="{{ $users->bln_masuk }}" selected="selected">{{ $users->bln_masuk }}</option>
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
                                            @error('bln_masuk')
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
                                            <label for="no_hp">No HP</label>
                                            <input type="text" name="no_hp" class="form-control
                                            @error('no_hp')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan No HP" value="{{ $users->no_hp }}" >
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
                                            <input type="text" name="pend_terakhir" class="form-control
                                            @error('pend_terakhir')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan Pendidikan Terakhir" value="{{ $users->pend_terakhir }}" >
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
                                            <input type="text" name="email" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan Email" value="{{ $users->email }}" >
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
                                            <input type="password" name="password" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                            " placeholder="Masukan Password" value="{{ $users->password }}">
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
                                            <textarea name="alamat" class="form-control
                                            @error('email')
                                            is-invalid
                                            @enderror
                                            " rows="3" placeholder="Masukan Alamat">{{ $users->alamat }}
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
                                            " id="level" placeholder="- Pilih Level -" value="{{ $users->level }}" >
                                            <option  value="{{ $users->level }}">{{ $users->level }}</option>
                                                @if ($users->level == "kepala-bidang")
                                                    <option value="pegawai">Pegawai</option>
                                                @else
                                                    <option value="kepala-bidang">Kepala Bidang</option>
                                                
                                                @endif
                                                
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
                                                {{-- <img src="{{ asset ('img-user/'.$user->foto) }}" alt="user-image" class="img-circle elevation-2" width="15%"> --}}
                                                <input type="file" class="form-control " name="foto" value="{{ $users->foto }}">
                                                
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
