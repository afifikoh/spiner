<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
