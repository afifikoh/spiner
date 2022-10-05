<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $pegawai = Auth::user()->id;
        $hasilkinerja = Kinerja::where('angka', '0')->where('id_users',$pegawai)->count();
        
        $jml_pending = DB::table("kinerja")
            ->where("status", "pending")
            ->count("status");

        $terverifikasi = DB::table("kinerja")
            ->where("status", "success")
            ->count("status");

        $jml_dt_pegawai = User::count();

        $jml_bidang = Bidang::count();
        
        return view("layout.home",compact('hasilkinerja', "jml_pending",
                "jml_dt_pegawai",
                "jml_bidang",
                "terverifikasi"))->with([
            "user" => $user,
        ]);
    }
}
