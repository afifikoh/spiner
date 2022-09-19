@extends('layout.main')

@section('judul')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Data Bidang</h1>
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
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="kd_dinas">Kode Dinas</label>
                                        <input type="text" name="kd_dinas" class="form-control" id="kd_dinas" value="96" readonly >
                                        
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="kd_bidang">Kode Bidang</label>
                                        <input type="text" name="kd_bidang" class="form-control @error('kd_bidang')
                                        is-invalid
                                        @enderror" id="kd_bidang" 
                                        
                                        value="{{ old('kd_bidang') }}"
                                        autofocus='true' placeholder="Masukan kode bidang">
                                        @error('kd_bidang')
                                                <div class='invalid-feedback'>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="bidang">Nama Bidang</label>
                                        <input type="text" name="bidang" class="form-control @error('bidang')
                                        is-invalid
                                        @enderror" value="{{ old('bidang') }}" id="bidang" placeholder="Masukan Nama Bidang">
                                        @error('bidang')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
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