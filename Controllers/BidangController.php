<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Auth;
use App\Models\Bidang;
use App\Models\User;

use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::User();
        $keyword = $request->keyword;
        $bidang = Bidang::where('kd_bidang','LIKE', '%'.$keyword.'%')
        ->orWhere('bidang','LIKE', '%'.$keyword.'%')
        ->paginate(2);
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
        $validated = $request->validate([
            
            'kd_bidang'     => 'required|unique:bidang,kd_bidang',
            'bidang'   => 'required'
        ],
    [
        'kd_bidang.required'=> 'Kode Bidang tidak boleh kosong',
        'kd_bidang.unique'=> 'Kode Bidang sudah ada',
        'bidang.required'=> 'Nama Bidang tidak boleh kosong'
    ]);

        Bidang::create([
            'kd_dinas'     => $request->kd_dinas,
            'kd_bidang'     => $request->kd_bidang,
            'bidang'   => $request->bidang
        ]);

        return redirect('bidang')->with(['success'=>'Data Berhasil Ditambah!']);
    }

    public function edit($id)
    {
        $user = Auth::User();
        $bidang = Bidang::find($id);
        return view('data_bidang.edit_bdg', compact('bidang'))->with([
            "user" => $user,
        ]);

        
    }

    public function update(Request $request, $id)
    {
        $bidang = Bidang::find($id);
        
        
        $bidang->kd_dinas = $request->kd_dinas;
        $bidang->kd_bidang = $request->kd_bidang;
        $bidang->bidang = $request->bidang;
        $bidang->update();
        // $bidang->save();

        return redirect('/bidang');
    }

    public function destroy(Request $request, $id)
    {
        $bidang = Bidang::where('id',$id)->delete();
        return redirect('bidang')->with(['success'=>'Data Berhasil Dihapus!']);
    }


}
