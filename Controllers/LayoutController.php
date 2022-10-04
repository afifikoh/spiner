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
        return view("layout.home",compact('hasilkinerja'))->with([
            "user" => $user,
        ]);
    }
}
