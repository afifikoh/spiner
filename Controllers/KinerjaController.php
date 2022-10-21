<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Models\Kinerja;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class KinerjaController extends Controller
{
        public function index(Request $request)
    {
        $user = Auth::User();
        $pegawai = Auth::user()->id;
        $keyword = $request->keyword;
        $kinerja = Kinerja::where('user_id',$pegawai)
        ->whereIn('status',['draft','pending'])
        ->where('hasil','LIKE', '%'.$keyword.'%')->paginate();
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
        $nama = Auth::user()->nama;
        $bidang = Auth::user()->bidang;
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
        return view('data_kinerja.cetak',compact('kinerja','nama','bidang'))->with([$data,
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

    public function store(Request $request)
    {          
        $kinerja = Kinerja::where([
            'tgl' => $request->tgl,
            'user_id' => Auth()->id(),
        ]);
        
        if($kinerja->count() > 0)
        {    
            return redirect('kinerja-pegawai');
        }
        else
        {
            config(['app.locale' => 'id']);
            Carbon::setLocale('id');
            date_default_timezone_set('Asia/Jakarta');
            $validated = $request->validate([
                'tgl'       => 'required',
                'hasil'    => 'required',
                'foto'      => 'nullable',
                'doc'       => 'required|mimes:pdf',
                'status'     => 'required'
            ],
            [
                'hasil.required' => 'Rincian kinerja tidak boleh kosong!',
                'status.required' => 'Pilih terlebih dahulu!',
            ]);  

            $newFoto = ''; 
    
            if($request->hasFile('foto')){ 
                $foto = $request->file('foto');
                $foto_ext = $foto->getClientOriginalExtension();
                $newFoto = 'foto_kinerja'  . '.' . $foto_ext;

                $pathFoto = 'template/dist/img/kinerja/';
                $foto->move(public_path($pathFoto), $newFoto);
            }
    
            $doc = $request->file('doc');
            $doc_ext = $doc->getClientOriginalExtension();
            $newDoc = 'doc_kinerja'  . '.' . $doc_ext;
    
            
            $pathDoc = 'template/dist/img/kinerja/';
            $doc->move(public_path($pathDoc), $newDoc);
            Kinerja::create([
                'foto' => $newFoto,
                'doc' => $newDoc,
                'tgl' => $request->tgl,
                'hasil' => $request->hasil,
                'status' => $request->status,
                'user_id' => Auth()->id(),
            ]);
            Alert::success('Berhasil', 'Data berhasil disimpan');
            return redirect('kinerja-pegawai');            
        }
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

    public function data(Request $request)
    {
        if($request->ajax()){
            $user = Auth::User();
            $data = DB::table('kinerja')
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
            )
            ->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn("check", function($row) {
                $check = '<input type="checkbox" class="cb-child" name="checkbox[]" value="' .$row->id . '">';
                return $check;
            }) 
            ->addColumn("foto", function ($row) {
                $foto =
                    '<a href="template/dist/img/kinerja/' .
                    $row->foto .
                    '" class="btn btn-rounded btn-info"><i class="far fa-file-image"></i></a>';
                return $foto;
            })
            ->addColumn("doc", function ($row) {
                $doc =
                    '<a href="template/dist/img/kinerja/' .
                    $row->doc .
                    '" class="btn btn-rounded btn-info"><i class="far fa-file-pdf"></i></a>';
                return $doc;
            })
            ->addColumn("status", function ($row) {
                $status =
                    '<div class="badge badge-warning">' .
                    $row->status .
                    "</div>";

                return $status;
            })
            ->rawColumns(["check", "foto", "doc", "status"])
            ->make(true);
    
        }
    }
}
