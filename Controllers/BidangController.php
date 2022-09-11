<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;
use App\Models\Bidang;
use App\Models\User;

use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $bidang = Bidang::all();
        return view("data_bidang.bidang",compact('bidang'))->with([
            "user" => $user,
        ]);

       
    }

    public function create()
    {
        $user = Auth::User();
        return view('data_bidang.tambah_bdg')->with([
            "user" => $user,
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate($request, [
        //     'kd_dinas'     => 'required',
        //     'kd_bidang'     => 'required',
        //     'bidang'   => 'required'
        // ]);

        Bidang::create([
            'kd_dinas'     => $request->kd_dinas,
            'kd_bidang'     => $request->kd_bidang,
            'bidang'   => $request->bidang
        ]);

        return redirect('bidang');
    }

    public function edit($id)
    {
        $user = Auth::User();
        $bidang = Bidang::where('id',$id);
        return view('data_bidang.edit_bdg', compact('bidang'))->with([
            "user" => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $bidang = Bidang::where('id',$id)->update('kd_bidang','bidang');
        // $bidang->update($request->all());

        return redirect('bidang');
    }

    public function destroy(Request $request, $id)
    {
        $bidang = Bidang::where('id',$id)->delete();
        return redirect('bidang')->with(['succes'=>'Data Berhasil Dihapus!']);
    }


}
