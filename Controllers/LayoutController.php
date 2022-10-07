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
        $pegawai = Auth::User()->id;
        $hasilkinerja = Kinerja::where('angka','0')->where('user_id',$pegawai)->count();
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
                'hasilkinerja'
            )
        )->with([
            "user" => $user,
        ]);
    }
}
