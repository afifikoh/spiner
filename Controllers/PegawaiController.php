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

    public function index(Request $request)
    {
        $user = Auth::User();
        $keyword = $request->keyword;
        $users = User::where('nip','LIKE', '%'.$keyword.'%')
        ->orWhere('nama','LIKE', '%'.$keyword.'%')
        ->orWhere('bidang','LIKE', '%'.$keyword.'%')
        ->orWhere('alamat','LIKE', '%'.$keyword.'%')
        ->orWhere('email','LIKE', '%'.$keyword.'%')
        ->orWhere('level','LIKE', '%'.$keyword.'%')
        ->paginate();
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
        
        
        // $validated = $request->validate([
        //     // 'kode_dinas'  => 'required',
        //     'bidang'    => 'required',
        //     'nip'       => 'required|digits:18',
        //     'nik'       => 'required|digits:16',
        //     'nama'      => 'required',
        //     'tgl_lahir' => 'required',
        //     'jabatan' => 'required',
        //     'jk'        => 'required',
        //     'alamat'    => 'required',
        //     'email'     => 'required',
        //     'no_hp'     => 'required|numeric|max:13',
        //     'password'  => 'required',
        //     'thn_masuk' => 'required|numeric|max:4',
        //     'bln_masuk' => 'required',
        //     'pend_terakhir' => 'required',
        //     'level'     =>'required',
        //     'foto'     => 'required|image'
        // ],
        // [
        //     'bidang.required' => 'Bidang tidak boleh kosong',
        //     'jabatan.required' => 'Jabatan tidak boleh kosong!',
        //     'nip.required' => 'NIP tidak boleh kosong!',
        //     'nip.unique' => 'NIP sudah ada!',
        //     'nip.digits:18' => 'NIP hanya bisa diisi dengan karakter angka!',
        //     'nip.max:18' => 'NIP tidak boleh melebihi 18 karakter!',
        //     'nik.required' => 'NIK tidak boleh kosong!',
        //     'nik.unique' => 'NIK sudah ada!',
        //     'nik.digits' => 'NIK hanya bisa diisi dengan karakter angka!',
        //     'nik.max' => 'NIK tidak boleh melebihi 16 karakter!',
        //     'nama.required' => 'Nama tidak boleh kosong!',
        //     'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
        //     'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong!',
        //     'alamat.required' => 'Alamat tidak boleh kosong!',
        //     'password.required' => 'Password tidak boleh kosong!',
        //     'pend_terakhir.required' => 'Pendidikan Terakhir tidak boleh kosong!',
        //     'level.required' => 'Level tidak boleh kosong!',
        //     'email.required' => 'Email tidak boleh kosong!',
        //     'no_hp.required' => 'Nomoor Hp tidak boleh kosong!',
        //     'thn_masuk.required' => 'Tahun Masuk tidak boleh kosong!',
        //     'bln_masuk.required' => 'Bulan Masuk tidak boleh kosong!',
        //     'thn_masuk.numeric' => 'Tahun Masuk hanya bisa diisi dengan karakter angka!',
        //     'thn_masuk.max' => 'Tahun Masuk tidak boleh melebihi 4 karakter!',
        //     'foto.required' => 'Foto tidak boleh kosong!',
        //     'foto.numeric' => 'Foto hanya bisa diisi dengan karakter file gambar!',

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

    public function edit($id)
    {
        $user = Auth::User();
        $users = User::with('Bidang')->find($id);
        $bidang = Bidang::select('id','bidang')->get();
        return view('data_pegawai.edit_pgw', compact('users','bidang'))->with([
            "user" => $user,
        ]);

        
    }

    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     // 'kode_dinas'  => 'required',
        //     'bidang'    => 'required',
        //     'nip'       => 'required|digits:18',
        //     'nik'       => 'required|digits:16',
        //     'nama'      => 'required',
        //     'tgl_lahir' => 'required',
        //     'jabatan' => 'required',
        //     'jk'        => 'required',
        //     'alamat'    => 'required',
        //     'email'     => 'required',
        //     'no_hp'     => 'required|numeric|max:13',
        //     'password'  => 'required',
        //     'thn_masuk' => 'required|numeric|max:4',
        //     'bln_masuk' => 'required',
        //     'pend_terakhir' => 'required',
        //     'level'     =>'required',
        //     'foto'     => 'required|image'
        // ],
        // [
        //     'bidang.required' => 'Bidang tidak boleh kosong',
        //     'jabatan.required' => 'Jabatan tidak boleh kosong!',
        //     'nip.required' => 'NIP tidak boleh kosong!',
        //     'nip.unique' => 'NIP sudah ada!',
        //     'nip.digits:18' => 'NIP hanya bisa diisi dengan karakter angka!',
        //     'nip.max:18' => 'NIP tidak boleh melebihi 18 karakter!',
        //     'nik.required' => 'NIK tidak boleh kosong!',
        //     'nik.unique' => 'NIK sudah ada!',
        //     'nik.digits' => 'NIK hanya bisa diisi dengan karakter angka!',
        //     'nik.max' => 'NIK tidak boleh melebihi 16 karakter!',
        //     'nama.required' => 'Nama tidak boleh kosong!',
        //     'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
        //     'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong!',
        //     'alamat.required' => 'Alamat tidak boleh kosong!',
        //     'password.required' => 'Password tidak boleh kosong!',
        //     'pend_terakhir.required' => 'Pendidikan Terakhir tidak boleh kosong!',
        //     'level.required' => 'Level tidak boleh kosong!',
        //     'email.required' => 'Email tidak boleh kosong!',
        //     'no_hp.required' => 'Nomoor Hp tidak boleh kosong!',
        //     'thn_masuk.required' => 'Tahun Masuk tidak boleh kosong!',
        //     'bln_masuk.required' => 'Bulan Masuk tidak boleh kosong!',
        //     'thn_masuk.numeric' => 'Tahun Masuk hanya bisa diisi dengan karakter angka!',
        //     'thn_masuk.max' => 'Tahun Masuk tidak boleh melebihi 4 karakter!',
        //     'foto.required' => 'Foto tidak boleh kosong!',
        //     'foto.numeric' => 'Foto hanya bisa diisi dengan karakter file gambar!',

        // ]);  

        $foto = $request->file('foto');
        $newFoto = 'foto_pegawai' . '_' . time() . '.' . $foto->extension();
    
        $path = 'img-user/';
        $request->foto->move(public_path($path), $newFoto);
        
        $users = User::find($id);
            $users->kode_dinas = $request->kode_dinas;
            $users->bidang   = $request->bidang;
            $users->nip       = $request->nip;
            $users->nik       = $request->nik;
            $users->nama      = $request->nama;
            $users->tgl_lahir = $request->tgl_lahir;
            $users->jk        = $request->jk;
            $users->alamat    = $request->alamat;
            $users->email     = $request->email;
            $users->no_hp    = $request->no_hp;
            $users->password  = $request->password;
            $users->thn_masuk = $request->thn_masuk;
            $users->bln_masuk = $request->bln_masuk;
            $users->pend_terakhir = $request->pend_terakhir;
            $users->foto      = $newFoto;
            $users->level     = $request->level;
        $users->update();
        // $bidang->save();

        return redirect('/pegawai');
    }


    public function destroy(Request $request, $id)
    {
        $users = User::where('id',$id)->delete();
        return redirect('pegawai')->with(['success'=>'Data Berhasil Dihapus!']);
    }
    
    public function laporan()
    {
        $user = Auth::User();
        return view('laporan_kinerja.lapkinerja_adm')->with([
            "user" => $user,
        ]);
    }
}
