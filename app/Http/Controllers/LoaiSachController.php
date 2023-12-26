<?php

namespace App\Http\Controllers;

use App\Models\LoaiSach;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoaiSachController extends Controller
{
    public function getLists()
    {
        $loaisach = LoaiSach::all();
        return view('loaisach.danhsach', compact('loaisach'));
    }

    public function getAdd()
    {
        return view('loaisach.them');
    }
    public function postAdd(Request $request)
    {
        $orm = new LoaiSach();
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();
        return redirect()->route('loaisach');
    }
    public function getEdit($id)
    {
        $loaisach = LoaiSach::find($id);
        return view('loaisach.sua', compact('loaisach'));
    }
    public function postEdit(Request $request, $id)
    {
        $orm = LoaiSach::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();
        return redirect()->route('loaisach');
    }
    public function getDelete($id)
    {
        $orm = LoaiSach::find($id);
        $orm->delete();
        return redirect()->route('loaisach');
    }
}
