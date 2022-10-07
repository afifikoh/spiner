<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kinerja;
use Illuminate\Support\Facades\DB;

class KepBidangController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $pending_kinerja = DB::table("kinerja")
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
                // DB::raw("CONCAT(kinerja.foto,' ',kinerja.doc) as bukti")
            )
            ->get();
        return view(
            "kepala-bidang.kinerja-kepala",
            compact("pending_kinerja")
        )->with([
            "user" => $user,
        ]);
    }

    public function completedUpdate(Request $request, $id)
    {
        DB::table("kinerja")
            ->where("id", $id)
            ->update(["status" => "success"]);

        return redirect("kinerja-kepala")->with(
            "message",
            "Verifikasi Berhasil!"
        );
    }
}
