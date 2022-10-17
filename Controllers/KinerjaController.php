<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
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
        ->where('hasil','LIKE', '%'.$keyword.'%')->Latest()->paginate();
        $data = array
        (
            'kinerja' => $kinerja
        );

        return view ('data_kinerja.kinerja', compact('kinerja'))->with([$data,"user" => $user]);
    }
        
    public function cetakKinerja(Request $request)
    {
        $tglAwal = Carbon::parse(request('tglAwal'))->format('d/m/Y');
        $tglAkhir = Carbon::parse(request('tglAkhir'))->format('d/m/Y');
        $user = Auth::User();
        $pegawai = Auth::user()->id;
        $keyword = $request->keyword;
        $kinerja = Kinerja::where('user_id',$pegawai)
        ->where('status','=','success')
        ->where('hasil','LIKE', '%'.$keyword.'%')
        ->whereBetween('tgl', [$tglAwal, $tglAkhir])
        ->get();

        $data = array
        (
            'kinerja' => $kinerja
        );
        return view('data_kinerja.cetak',compact('kinerja'))->with([$data,
            "user" => $user,
        ]);
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
        
        if ($request->hasFile('foto'))
        {
            @unlink($pathFoto);
            
            $foto = $request->file('foto');
            $foto_ext = $foto->getClientOriginalExtension();
            $newFoto = 'foto_kinerja'  . '.' . $foto_ext;
            $pathFoto = 'template/dist/img/kinerja/';
            $foto->move($pathFoto, $newFoto);
            $kinerja->foto = $newFoto;
        }
        else if ($request->hasFile('doc'))
        {
            @unlink($pathDoc);

            $doc = $request->file('doc');
            $doc_ext = $doc->getClientOriginalExtension();
            $newDoc = 'doc_kinerja'  . '.' . $doc_ext;
            $pathDoc = 'template/dist/img/kinerja/';
            $doc->move($pathDoc, $newDoc);
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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
            
        $validated = $request->validate([
            'tgl'       => 'required|unique:kinerja,tgl,except,id',
            'hasil'    => 'required',
            'foto'       => 'required|mimes:jpeg,png,jpg',
            'doc'       => 'required|mimes:pdf',
            'status'     => 'required'
        ],
        [
            'tgl.unique' => 'Hanya boleh input sekali dalam sehari!',
            'hasil.required' => 'Rincian kinerja tidak boleh kosong!',
        ]);  

        $foto = $request->file('foto');
        $foto_ext = $foto->getClientOriginalExtension();
        $newFoto = 'foto_kinerja'  . '.' . $foto_ext;

        $doc = $request->file('doc');
        $doc_ext = $doc->getClientOriginalExtension();
        $newDoc = 'doc_kinerja'  . '.' . $doc_ext;

        $pathFoto = 'template/dist/img/kinerja/';
        $pathDoc = 'template/dist/img/kinerja/';
        $foto->move(public_path($pathFoto), $newFoto);
        $doc->move(public_path($pathDoc), $newDoc);
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
        $pathFoto = 'template/dist/img/kinerja/'.$kinerja->foto;
        $pathDoc  = 'template/dist/img/kinerja/'.$kinerja->doc;
        @unlink($pathFoto);
        @unlink($pathDoc);
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
