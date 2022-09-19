<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Kinerja;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;

class KinerjaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::User();
        // $kinerja=Kinerja::all();
        // return view('data_kinerja.kinerja',compact('kinerja'))->with([
        // "user" => $user,

        $keyword = $request->keyword;
        $kinerja = Kinerja::where('hasil','LIKE', '%'.$keyword.'%')
        ->orWhere('hasil','LIKE', '%'.$keyword.'%')
        ->paginate();
        return view('data_kinerja.kinerja',compact('kinerja'))->with([
        "user" => $user,
    ]);
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

    public function laporan()
    {
        $user = Auth::User();
        return view('laporan_kinerja.lapkinerja_pgw')->with([
            "user" => $user,
        ]);
    }

    public function store(Request $request)
    {
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
        return redirect('/data_kinerja/kinerja-pegawai')->with('status','Data berhasil di hapus!');
    }   
}
