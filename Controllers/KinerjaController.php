<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Kinerja;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;

class KinerjaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::User();
    $kinerja=Kinerja::all();
    return view('data_kinerja.kinerja',compact('kinerja'))->with([
        "user" => $user,
    ]);
    }
    
}
