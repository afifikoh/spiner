<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $users = User::with('nmbidang')->where('nip','LIKE', '%'.$keyword.'%')
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
        $validated = $request->validate([
            
            'bidang'    => 'required',
            'nik'       => 'required',
            'nama'      => 'required',
            'tgl_lahir' => 'required',
            'jk'        => 'required',
            'alamat'    => 'required',
            'email'     => 'required',
            'no_hp'     => 'required',
            'password'  => 'required',
            'thn_masuk' => 'required',
            'bln_masuk' => 'required',
            'pend_terakhir' => 'required',
            'jabatan'   => 'required',
            'level'     =>'required',
            // 'foto'     => 'required'
        ],
        [
            'bidang.required' => 'Bidang tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong!',
            'nip.required' => 'NIP tidak boleh kosong!',
            'nip.unique' => 'NIP sudah ada!',
            'nip.digits:18' => 'NIP hanya bisa diisi dengan karakter angka!',
            'nip.max:18' => 'NIP tidak boleh melebihi 18 karakter!',
            'nik.required' => 'NIK tidak boleh kosong!',
            'nik.unique' => 'NIK sudah ada!',
            'nik.digits' => 'NIK hanya bisa diisi dengan karakter angka!',
            'nik.max' => 'NIK tidak boleh melebihi 16 karakter!',
            'nama.required' => 'Nama tidak boleh kosong!',
            'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
            'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'pend_terakhir.required' => 'Pendidikan Terakhir tidak boleh kosong!',
            'level.required' => 'Level tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'no_hp.required' => 'Nomoor Hp tidak boleh kosong!',
            'thn_masuk.required' => 'Tahun Masuk tidak boleh kosong!',
            'bln_masuk.required' => 'Bulan Masuk tidak boleh kosong!',
            'thn_masuk.numeric' => 'Tahun Masuk hanya bisa diisi dengan karakter angka!',
            'thn_masuk.max' => 'Tahun Masuk tidak boleh melebihi 4 karakter!',
            'foto.required' => 'Foto tidak boleh kosong!',
            'foto.numeric' => 'Foto hanya bisa diisi dengan karakter file gambar!',

        ]);  

        $foto = $request->file('foto');
        $newFoto = 'foto_pegawai' . '_' . time() . '.' . $foto->extension();
    
        $path = 'img-user/';
        $request->foto->move(public_path($path), $newFoto);

        $user = new User();
        $user->kode_dinas = $request->kode_dinas;
        $user->bidang = $request->bidang;

        $user->nik = $request->nik;
        $user->nama = $request->nama;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->jk = $request->jk;
        $user->jabatan = $request->jabatan;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->password = Hash::make($request->password);
        $user->thn_masuk = $request->thn_masuk;
        $user->bln_masuk = $request->bln_masuk;
        $user->pend_terakhir = $request->pend_terakhir;
        $user->level = $request->level;
        $user->foto = $newFoto;

        if ($request->level != "kepala-bidang") {
            $year = $request->thn_masuk;
            $month = $request->bln_masuk;
            $lhr = $request->tgl_lahir;
            $cek = User::count();
            if ($cek <= 0) {
                $urt = 1;
            } else {
                $urt = $cek + 1;
            }
            $tgllhr = str_replace(["-", " "], "", $lhr);
            $gabung =
                $tgllhr .
                "" .
                $year .
                "" .
                $month .
                "3" .
                str_pad($urt, 3, "0", STR_PAD_LEFT);
        } else {
            $gabung = $request->nip;
        }

        $user->nip = $gabung;

        $user->save();
        return redirect('pegawai');
    }
    
    public function edit(Request $request, $id)
    {
        $user = Auth::User();
        $users = User::with('nmbidang')->find($id);
        $bidang = Bidang::where('id', '!=', $users->nmbidang->id)->get(['id','bidang']);
        return view('data_pegawai.edit_pgw', compact('users','bidang'))->with([
            "user" => $user,
        ]);  
    }
    
    public function update(Request $request, $id)
    {
    $validated = $request->validate([
            // 'kode_dinas'  => 'required',
            'bidang'    => 'required',
            'nip'       => 'required',
            'nik'       => 'required',
            'nama'      => 'required',
            'tgl_lahir' => 'required',
            'jabatan' => 'required',
            'jk'        => 'required',
            'alamat'    => 'required',
            'email'     => 'required',
            'no_hp'     => 'required',
            'password'  => 'required',
            'thn_masuk' => 'required',
            'bln_masuk' => 'required',
            'pend_terakhir' => 'required',
            'level'     =>'required',
            // 'foto'     => 'required|image'
        ],
        [
            'bidang.required' => 'Bidang tidak boleh kosong',
            'jabatan.required' => 'Jabatan tidak boleh kosong!',
            'nip.required' => 'NIP tidak boleh kosong!',
            'nip.unique' => 'NIP sudah ada!',
            'nip.digits:18' => 'NIP hanya bisa diisi dengan karakter angka!',
            'nip.max:18' => 'NIP tidak boleh melebihi 18 karakter!',
            'nik.required' => 'NIK tidak boleh kosong!',
            'nik.unique' => 'NIK sudah ada!',
            'nik.digits' => 'NIK hanya bisa diisi dengan karakter angka!',
            'nik.max' => 'NIK tidak boleh melebihi 16 karakter!',
            'nama.required' => 'Nama tidak boleh kosong!',
            'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
            'tgl_lahir.required' => 'Tanggal Lahir tidak boleh kosong!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'pend_terakhir.required' => 'Pendidikan Terakhir tidak boleh kosong!',
            'level.required' => 'Level tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'no_hp.required' => 'Nomoor Hp tidak boleh kosong!',
            'thn_masuk.required' => 'Tahun Masuk tidak boleh kosong!',
            'bln_masuk.required' => 'Bulan Masuk tidak boleh kosong!',
            'thn_masuk.numeric' => 'Tahun Masuk hanya bisa diisi dengan karakter angka!',
            'thn_masuk.max' => 'Tahun Masuk tidak boleh melebihi 4 karakter!',
            'foto.required' => 'Foto tidak boleh kosong!',
            'foto.numeric' => 'Foto hanya bisa diisi dengan karakter file gambar!',

        ]);  

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
            $users->jabatan = $request->jabatan;
            $users->foto      = $newFoto;
            $users->level     = $request->level;
            $users->update();
        

        return redirect('/pegawai');
    }
    
    public function editprofil(Request $request, $id)
    {
        $user = Auth::User();
        $users = User::find($id);
        return view('data_kinerja.edit_profil',compact('users'))->with([
            "user" => $user,
        ]);  
    }

    
    public function updateprofil(Request $request, $id)
    {
$request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'email' => 'required|unique:users',
        'no_hp' => 'required'
    ],
    [
        'nama.required' => 'Nama tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong!',
        'email.required' => 'Email tidak boleh kosong!',
        'email.unique' => 'Email sudah ada!',
        'no_hp.required' => 'No HP tidak boleh kosong!'
    ]);
        $users = User::find($id);
            $users->nama      = $request->nama;
            $users->alamat    = $request->alamat;
            $users->email     = $request->email;
            $users->no_hp    = $request->no_hp;
        $users->update();

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect('pengaturan-pegawai');
    }
    
    public function editfoto(Request $request, $id)
    {
        $user = Auth::User();
        $users = User::find($id);
        return view('data_kinerja.edit_foto',compact('users'))->with([
            "user" => $user,
        ]);  
    }

    public function updatefoto(Request $request, $id)
    {
        $request->validate([
        'foto' => 'required|image',
    ],
    [
        'foto.required' => 'Pilih Foto!',
    ]);

        $foto = $request->file('foto');
        $newFoto = 'foto_pegawai' . '_' . time() . '.' . $foto->extension();
        
        $path = 'img-user/';
        $request->foto->move(public_path($path), $newFoto);
        $users = User::find($id);
            $users->foto      = $newFoto;
        $users->update();

        Alert::success('Berhasil', 'Foto profil berhasil diubah');
        return redirect('edit-profil-pegawai/{id}');
    }
 
    public function editpassword($id)
    {
        $user = Auth::User();
        $users = User::find($id);
        return view('data_kinerja.edit_password', compact('users'))->with([
            "user" => $user,
        ]);  
    }

    public function updatepassword(Request $request, $id)
    {
    // $user = Auth::User();
    $users = User::find($id);
    $request->validate([
        'password_lama' => 'required|same:password',
        'password_baru' => 'required',
        'password_konfirmasi' => 'same:password_baru'
    ],
    [
        'password_lama.same' => 'Password tidak sesuai!',
        'password_lama.required' => 'Password tidak boleh kosong',
        'password_baru.required' => 'Password baru tidak boleh kosong!',
        'password_konfirmasi.same' => 'Password baru dan konfirmasi password harus sama!',
    ]);

    if(!Hash::check($request->password_lama, auth()->user()->password)){
        return back()->with("error", "Password tidak sesuai!");
    }

    User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->password_baru)
    ]);

    Alert::success('Berhasil', 'Password berhasil diubah');
    return redirect('pengaturan-pegawai');
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
