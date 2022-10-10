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
        public function index(Request $request)
    {
        $user = Auth::User();
        $pegawai = Auth::user()->id;
        $keyword = $request->keyword;
        $kinerja = Kinerja::where('user_id',$pegawai)
        ->where('status','=','draft')
        ->orwhere('status','=','pending')
        ->where('hasil','LIKE', '%'.$keyword.'%')->paginate();
        $data = array
        (
            'kinerja' => $kinerja
        );

        return view ('data_kinerja.kinerja', compact('kinerja'))->with([$data,"user" => $user]);
    }

    public function restore($id)
    {
        $restore = Kinerja::find($id);
        $restore->status='pending';
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
    
    public function edit(Request $request, $id)
    {
        $user = Auth::User();
        $kinerja = Kinerja::find($id);
        return view('data_kinerja.edit_kinerja', compact('kinerja'))->with([
            "user" => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $kinerja = Kinerja::find($id);
        $newFoto = $kinerja->foto;
        $newDoc = $kinerja->doc;
        $pathFoto = public_path('template/dist/img/kinerja/ . $newFoto');
        $pathDoc = public_path('template/dist/img/kinerja/ . $newDoc');
        
        if ($request->hasFile('foto','doc'))
        {
            @unlink($pathFoto);
            @unlink($pathDoc);

            $foto = $request->file('foto');
            $doc = $request->file('doc');

            $foto_ext = $foto->getClientOriginalExtension();
            $doc_ext = $doc->getClientOriginalExtension();

            $newFoto = 'foto_kinerja'  . '.' . $foto_ext;
            $newDoc = 'doc_kinerja'  . '.' . $doc_ext;

            $pathFoto = 'template/dist/img/kinerja/';
            $pathDoc = 'template/dist/img/kinerja/';

            $foto->move($pathFoto, $newFoto);
            $doc->move($pathDoc, $newDoc);
            $kinerja->foto = $newFoto;
            $kinerja->doc = $newDoc;
        }
        else
        {
            $kinerja->foto = $request->old_foto;
            $kinerja->doc = $request->old_doc;
        }

        $kinerja->hasil = $request->hasil;
        $kinerja->save();

        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect('kinerja-pegawai');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hasil'    => 'required',
            'foto'       => 'required|mimes:jpeg,png,jpg',
            'doc'       => 'required|mimes:pdf',
            'status'     => 'required'
        ],
        [
            'hasil.required' => 'Rincian kinerja tidak boleh kosong!',
        ]);  

        $foto = $request->file('foto');
        $foto_ext = $foto->getClientOriginalExtension();
        $newFoto = 'foto_kinerja'  . '.' . $foto_ext;

        $doc = $request->file('doc');
        $doc_ext = $doc->getClientOriginalExtension();
        $newDoc = 'doc_kinerja'  . '.' . $doc_ext;

        $path = 'template/dist/img/kinerja/';
        $request->foto->move(public_path($path), $newFoto);
        $request->doc->move(public_path($path), $newDoc);
        Kinerja::create([
            'foto' => $newFoto,
            'doc' => $newDoc,
            'tgl' => $request->tgl,
            'hasil' => $request->hasil,
            'status' => $request->status,
            'user_id' => Auth::user()->id
        ]);
        
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
}
