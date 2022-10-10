<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kinerja;
use Illuminate\Support\Facades\DB;

class KepBidangController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $pending_kinerja = DB::table("kinerja")
            ->leftJoin("users", "kinerja.user_id", "=", "users.id")
            ->leftJoin("bidang", "users.bidang", "=", "bidang.bidang")
            ->where("kinerja.status", "=", "pending")
            ->where("users.level", "=", "pegawai")
            ->where("users.bidang", "=", $user->bidang)
            ->select(
                "users.nama",
                "kinerja.id",
                "kinerja.hasil",
                "kinerja.foto",
                "kinerja.doc",
                "kinerja.tgl",
                "kinerja.status",
                "users.bidang"
                // DB::raw("CONCAT(kinerja.foto,' ',kinerja.doc) as bukti")
            )
            ->get();
        return view(
            "kepala-bidang.kinerja-kepala",
            compact("pending_kinerja")
        )->with([
            "user" => $user,
        ]);
    }

    public function completedUpdate(Request $request, $id)
    {
        DB::table("kinerja")
            ->where("id", $id)
            ->update(["status" => "success"]);

        return redirect("kinerja-kepala")->with(
            "message",
            "Verifikasi Berhasil!"
        );
    }
    
    public function pengaturan()
    {
        $user = Auth::User();
        return view('pengaturan.pengaturan_KepBidang')->with([
            "user" => $user,
        ]);
    }

    public function editprofil(Request $request, $id)
    {
        $user = Auth::User();
        $users = User::find($id);
        return view('kepala-bidang.edit_profil',compact('users'))->with([
            "user" => $user,
        ]);  
    }

    
    public function updateprofil(Request $request, $id)
    {
        $request->validate([
        // 'foto' => 'required|image',
        'nama' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'no_hp' => 'required'
    ],
    [
        // 'foto.required' => 'Pilih Foto!',
        'nama.required' => 'Nama tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong!',
        'email.required' => 'Email tidak boleh kosong!',
        // 'email.unique' => 'Email sudah ada!',
        'no_hp.required' => 'No HP tidak boleh kosong!'
    ]);

        // $foto = $request->file('foto');
        // $newFoto = 'foto_pegawai' . '_' . time() . '.' . $foto->extension();
        
        // $path = 'img-user/';
        // $request->foto->move(public_path($path), $newFoto);
        $users = User::find($id);
            // $users->foto      = $newFoto;
            $users->nama      = $request->nama;
            $users->alamat    = $request->alamat;
            $users->email     = $request->email;
            $users->no_hp    = $request->no_hp;
        $users->update();

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect('pengaturan');
    }

    public function editfoto(Request $request, $id)
    {
        $user = Auth::User();
        $users = User::find($id);
        return view('kepala-bidang.edit_foto',compact('users'))->with([
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
        return redirect('edit-profil/{id}');
    }
    
    public function editpassword($id)
    {
        $user = Auth::User();
        $users = User::find($id);
        return view('kepala-bidang.edit_password', compact('users'))->with([
            "user" => $user,
        ]);  
    }

    public function updatepassword(Request $request, $id)
    {
    // $user = Auth::User();
    $users = User::find($id);
    
    $password = auth()->user()->password;
    $password_lama = request('password_lama');
    if(Hash::check($password_lama, $password)){
    } else {
        return back()->withErrors(['password_lama'=>'Password tidak sesuai!']);
    }

    $request->validate([
        'password_lama' => 'required',
        'password_baru' => 'required',
        'password_konfirmasi' => 'same:password_baru'
    ],
    [
        'password_lama.required' => 'Password tidak boleh kosong',
        'password_baru.required' => 'Password baru tidak boleh kosong!',
        'password_konfirmasi.same' => 'Password baru dan konfirmasi password harus sama!'
    ]);

    User::whereId(auth()->User()->id)->update([
        'password' => Hash::make($request->password_baru)
    ]);

    Alert::success('Berhasil', 'Password berhasil diubah');
    return redirect('pengaturan');
    }
}
