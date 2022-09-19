@extends('layout.main')

@section('judul')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
     <div class="col-sm-12">
       <div class="row mb-0">
         <h1 class="font-weight-bold">Ubah Profil</h1>
       </div><!-- /.col -->
     </div><!-- /.row -->
    </div><!-- /.container-fluid -->
   </div>
 <!-- /.content-header -->
 
 <!-- ISI CONTENT -->
 <div class="container-fluid">
     <div class="col-sm-12">
       <div class="card">
         <form>
          <div class="col-lg-5">
            <div class="card-body">
               <div class="form-group">
                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
               </div>
               <div class="form-group">
                   <label for="exampleFormControlInput1">Nama</label>
                   <input type="nama" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div>
               <div class="form-group">
                     <label for="exampleFormControlInput1">Email</label>
                     <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
               </div>
               <div class="form-group">
                     <label for="exampleFormControlInput1">Alamat</label>
                     <input type="alamat" class="form-control" id="exampleFormControlInput1" placeholder="">
               </div>
               <div class="form-group">
                     <label for="exampleFormControlInput1">No Telp</label>
                     <input type="no_hp" class="form-control" id="exampleFormControlInput1" placeholder="">
               </div>
               <div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{url('/pegawai/pengaturan')}}" class="btn btn-warning">Batal</a>
               </div>
            </div>
           </div>
         </form>
       </div>
     </div>
 </div>
   
 <!-- ISI CONTENT -->
 @endsection