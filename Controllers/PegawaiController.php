<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;
use App\Models\Bidang;
use App\Models\User;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // public function index()
    // {
    //     echo "Data Pegawai";
    // }

    public function index()
    {
        $user = Auth::User();
        $users = User::all();
        return view('data_pegawai.pegawai', compact('users'))
        ->with([
            "user" => $user,
        ]);

        
    }

    Public function create()
    {
        $user = Auth::User();
        $bidang = Bidang::select('id','bidang')->get();
        return view('data_pegawai.tambah_pgw',compact('bidang'))->with([
            "user" => $user,
        ]);
    }

    public function store (Request $request)
    {
        
        
        // $request->validate( [
        //     'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);  

        $foto = $request->file('foto');
        $newFoto = 'foto_pegawai' . '_' . time() . '.' . $foto->extension();
    
        $path = 'img-user/';
        $request->foto->move(public_path($path), $newFoto);

        User::create([
            'kode_dinas'  => $request->kode_dinas,
            'bidang'    => $request->bidang,
            'nip'       => $request->nip,
            'nik'       => $request->nik,
            'nama'      => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'jk'        => $request->jk,
            'alamat'    => $request->alamat,
            'email'     => $request->email,
            'no_hp'     => $request->no_hp,
            'password'  => $request->password,
            'thn_masuk' => $request->thn_masuk,
            'bln_masuk' => $request->bln_masuk,
            'pend_terakhir' => $request->pend_terakhir,
            'foto'      => $newFoto,
            'level'     => $request->level
        ]);

        return redirect('pegawai');
    }
}