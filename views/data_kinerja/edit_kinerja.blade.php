@extends('layout.main')

@section('judul')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Kinerja</h1>
            </div>    
        </div>
    </div>
</section>
@endsection

@section('isi')
<section class="content">
  <div class="container-fluid">
    <div class="col-sm-12">
      <div class="card">
              <form action="/update/draft/{{ $kinerja->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  {{-- @method('PUT') --}}
                  <div class="form-group col-md-2">
                    <label for="tgl">Tanggal</label>
                    <input type="text" class="form-control" name="tgl" id="tgl" readonly value="{{ date("d/m/Y") }}" data-target="#tgl" data-toggle="datetimepicker">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="hasil">Rincian Kinerja</label>
                      <input type="text" class="form-control
                      @error('hasil')
                        is-invalid
                      @enderror
                        " id="hasil" name='hasil' rows="4" value="{{ $kinerja->hasil }}">
                      @error('hasil')
                        <div class='invalid-feedback'>
                          {{ $message }}
                        </div>
                      @enderror
                  </div>
                  <div class="form-group col-md-5">
                    <label for="foto">Bukti Foto</label><br>
                    @if($kinerja->foto)
                    <a href="{{ asset('template/dist/img/kinerja/'.$kinerja['foto']) }}">Lihat Foto</a>
                    @else
                    <span class= "badge badge-danger">Belum ada foto</span>
                    @endif
                    <div class="input-group">
                      <input type="file" class="form-control 
                      @error('foto')
                        is-invalid
                      @enderror
                        " id="foto" name="foto" value="{{ $kinerja->foto }}">
                      @error('foto')
                        <div class='invalid-feedback'>
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="foto">Bukti Documment .pdf</label><br>
                    @if($kinerja->doc)
                    <a href="{{ asset('template/dist/img/kinerja/'.$kinerja['doc']) }}">Lihat Doc</a>
                    @else
                    <span class= "badge badge-danger">Belum ada documment</span>
                    @endif
                    <div class="input-group">
                      <input type="file" class="form-control 
                      @error('doc')
                        is-invalid
                      @enderror
                        " id="doc" name="doc" value="{{ $kinerja->doc }}">
                      @error('doc')
                        <div class='invalid-feedback'>
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="float-right">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{url('kinerja-pegawai')}}"><i class="btn btn-light">Batal</i></a> 
                </div>
              </form>
      </div>
    </div>
  </div>
</section>
 @endsection
