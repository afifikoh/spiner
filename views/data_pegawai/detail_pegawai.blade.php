@extends('layout.main')

@section('judul')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Pegawai</h1>
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
                      <form action="/get-pegawai/{{ $users->id }}" method="GET" enctype="multipart/form-data">
                          @csrf
<div class="card">
  <div class="card-header">
    <h3 class="card-title">{{ $users->nip }} | {{ $users->nama }}</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-o">
    <table id="example" class="table">

      <tbody>
        <tr>
          <td rowspan="15">
            <img src="{{ asset ('img-user/'.$users['foto']) }}" alt="user-image" width="150px">
            <br>
            
          </td>
          <td>NIP</td>
          <td>{{ $users->nip }}</td>
        </tr>
        <tr>
          <td>NIK</td>
          <td>{{ $users->nip  }}</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>{{ $users->nama  }}</td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td>{{ $users->tgl_lahir }}</td>
        </tr>
        
        <tr>
          <td>Bidang</td>
          <td>{{ $users->nmbidang->bidang }}</td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>{{ $users->jabatan }}</td>
        </tr>
        <tr>
          <td>Tahun Masuk</td>
          <td>{{ $users->thn_masuk }}</td>
        </tr>
        <tr>
          <td>Bulan Masuk</td>
          <td>{{ $users->bln_masuk }}</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>{{ $users->email }}</td>
        </tr>
        <tr>
          <td>No Hp</td>
          <td>{{ $users->no_hp }}</td>
        </tr>
        <tr>
          <td>Pendidikan Terakhir</td>
          <td>{{ $users->pend_terakhir }}</td>
        </tr>
        <tr>
          <td>Alamat Lengkap</td>
          <td>{{ $users->alamat }}</td>
        </tr>
        
      </tbody>

    </table>
  </div>
  <!-- /.card-body -->
</div>
</form>
{{-- </div> --}}
</div>
</div>
</div>
</div>
</div>
</section>
@endsection





{{-- <div class="modal fade" id="modal-pegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="get-pegawai" method="GET">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div> --}}