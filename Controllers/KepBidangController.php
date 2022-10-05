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
            ->where("kinerja.status", "=", "pending")
            ->where("users.level", "=", "pegawai")
            // ->where("users.bidang", "=", "bidang")
            ->select(
                "users.nama",
                "kinerja.id",
                "kinerja.hasil",
                "kinerja.foto",
                "kinerja.doc",
                "kinerja.tgl",
                "kinerja.status"
            )
            ->get();
        // dd($users);
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