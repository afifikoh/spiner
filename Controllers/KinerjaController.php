<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Kinerja;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class KinerjaController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $pegawai = Auth::user()->id;
        $kinerja = Kinerja::where('angka', '0')->where('id_users',$pegawai)->paginate(31);
        $data = array
        (
            'kinerja' => $kinerja
        );

        return view ('data_kinerja.kinerja', compact('kinerja','hasilkinerja'))->with([$data,"user" => $user]);
    }

    public function draft()
    {
        $user = Auth::User();
        $kinerja = Kinerja::where('angka', '1')->paginate(31);
        $data = array
        (
            'kinerja' => $kinerja
        );

        return view ('data_kinerja.draft', compact('kinerja'))->with([$data, "user" => $user]);
    }

    public function restore($id)
    {
        $restore = Kinerja::find($id);
        $restore->angka='0';
        $restore->save();
        return redirect('kinerja-pegawai');
    }

    public function create()
    {
        $user = Auth::User();
        return view('data_kinerja.tambah_kinerja')->with([
            "user" => $user,
        ]);
    }

    public function pengaturan()
    {
        $user = Auth::User();
        return view('pengaturan.pengaturan_pegawai')->with([
            "user" => $user,
        ]);
    }

    public function editprofil()
    {
        $user = Auth::User();
        return view('data_kinerja.edit_profil')->with([
            "user" => $user,
        ]);
    }

    public function editpassword()
    {
        $user = Auth::User();
        return view('data_kinerja.edit_password')->with([
            "user" => $user,
        ]);
    }

    public function laporan()
    {
        $user = Auth::User();
        return view('laporan_kinerja.lapkinerja_pgw')->with([
            "user" => $user,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hasil'    => 'required',
            'foto'       => 'required|mimes:jpeg,png,jpg',
            'doc'       => 'required|mimes:pdf',
            'angka'     => 'required'
        ],
        [
            'hasil.required' => 'Hasil tidak boleh kosong!',
            'foto.required' => 'Foto tidak boleh kosong!',
            'doc.required' => 'Doc harus diisi berupa .pdf!',
        ]);  

        $foto = $request->file('foto');
        $newFoto = 'foto_kinerja' . '_' . time() . '.' . $foto->extension();

        $doc = $request->file('doc');
        $newDoc = 'doc_kinerja' . '_' . time() . '.' . $doc->extension();

        $path = 'template/dist/img/kinerja/';
        $request->foto->move(public_path($path), $newFoto);
        $request->doc->move(public_path($path), $newDoc);
        // $foto = $request->file('foto');
        // $foto->storeAs('public/images', $foto->hashName());
        // $doc = $request->file('doc');
        // $doc->storeAs('public/images', $doc->hashName());
        Kinerja::create([
            'foto' => $newFoto,
            'doc' => $newDoc,
            'tgl' => $request->tgl,
            'hasil' => $request->hasil,
        ]);
        // $message="Berhasil Simpan Data";
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect('kinerja-pegawai');
    }

    public function destroy($id, Request $request)
    {
        $kinerja = Kinerja::find($id);
        $kinerja->delete();
        $foto = 'template/dist/img/kinerja/'.$kinerja->foto;
        $doc  = 'template/dist/img/kinerja/'.$kinerja->doc;
        @unlink($foto);
        @unlink($doc);
        //File::delete($path);
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect('kinerja-pegawai');
    }
}
