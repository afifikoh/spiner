<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Bidang;
use App\Models\Kinerja;
use Psy\Command\WhereamiCommand;

class LayoutController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $pegawai = Auth::user()->id;

        //Admin
        $dt_pgw = User::all()->count();
        $bidang = Bidang::all()->count();

        //Pegawaicek
        $hasilkinerja = Kinerja::where('user_id',$pegawai)->count();
        $laporan = Kinerja::where('status', 'success')->where('user_id',$pegawai)->count();

        //Kepala Bidang
        $lap_kepala = Kinerja::where('status', 'pending')->count();
        
        $jml_pending = DB::table("kinerja")
            ->where("status", "pending")
            // ->where("id", $user->bidang)
            ->count("status");

        $terverifikasi = DB::table("kinerja")
            ->where("status", "success")
            ->count("status");

        $jml_dt_pegawai = User::count();

        $jml_bidang = Bidang::count();
        return view(
            "layout.home",
            compact(
                "jml_pending",
                "jml_dt_pegawai",
                "jml_bidang",
                "terverifikasi",
                "dt_pgw",
                "bidang",
                "lap_kepala",
                "hasilkinerja",
                "laporan"
            )
        )->with([
            "user" => $user,
        ]);
    }
}
