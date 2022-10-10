<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Kinerja;

class LaporanController extends Controller
{
    public function index()
    {
        echo "Laporan";
    }
    
    public function laporan(Request $request)
    {
        $user = Auth::User();
        $pegawai = Auth::user()->id;
        $keyword = $request->keyword;
        $kinerja = Kinerja::where('user_id',$pegawai)
        ->where('status','=','success')
        ->where('hasil','LIKE', '%'.$keyword.'%')->paginate();
        $data = array
        (
            'kinerja' => $kinerja
        );
        return view('laporan_kinerja.lapkinerja_pgw',compact('kinerja'))->with([
            "user" => $user,
        ]);
    }

    public function tampilkan(Request $request)
    {
        $tglAwal = $request->input('tglAwal');
        $tglAkhir = $request->input('tglAkhir');

        $query = DB::table('kinerja')->select()
                ->where('tgl','>=',$tglAwal)
                ->where('tgl','<=',$tglAkhir)
                ->get();

        $laporan = DB::table('kinerja')
                    ->select()->get();
        return view('laporan_kinerja.lapkinerja_pgw', compact('query','laporan'));
    }
}
