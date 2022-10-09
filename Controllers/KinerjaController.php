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
        $kinerja = Kinerja::where('user_id',$pegawai)->where('hasil','LIKE', '%'.$keyword.'%')->paginate();
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
        $request->validate([
            'hasil'    => 'required',
            'foto'       => 'mimes:jpeg,png,jpg',
            'doc'       => 'mimes:pdf',
        ],
        [
            'hasil.required' => 'Hasil tidak boleh kosong!',
            'foto.required' => 'Foto harus diisi berupa jpg, png, jpeg!',
            'doc.required' => 'Doc harus diisi berupa .pdf!',
        ]);
        $foto = $request->file('foto');
        $newFoto = 'foto_kinerja' . '_' . time() . '.' . $foto->extension();

        $doc = $request->file('doc');
        $newDoc = 'doc_kinerja' . '_' . time() . '.' . $doc->extension();

        $path = 'template/dist/img/kinerja/';
        $request->foto->move(public_path($path), $newFoto);
        $request->doc->move(public_path($path), $newDoc);

        $kinerja = Kinerja::find($id);
            $kinerja->foto = $newFoto;
            $kinerja->doc = $newDoc;
            $kinerja->hasil = $request->hasil;
        $kinerja->update();

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect('/kinerja-pegawai');
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
            'status'     => 'required'
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
            'status' => $request->status,
            'user_id' => Auth::user()->id
        ]);
        
        //alert berhasil simpan draft atau submit
        if($request->angka=='1'){
        Alert::success('Berhasil', 'Data berhasil disimpan dalam draft');
        return redirect('draft');
        } else{
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect('kinerja-pegawai');
        }
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
