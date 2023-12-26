<?php

namespace App\Http\Controllers;

use App\Models\TinhTrangDonHang;
use Illuminate\Http\Request;

class TinhTrangDonHangController extends Controller
{
    public function getLists()
    {
        $tinhtrang = TinhTrang::all();
        return view('admin.tinhtrang.danhsach', compact('tinhtrang'));
    }

    public function getAdd()
    {
        return view('admin.tinhtrang.them');
    }

    public function postAdd(Request $request)
    {
        // Kiểm tra
        $request->validate([
            'tinhtrang' => ['required', 'string', 'max:191', 'unique:tinhtrang'],
        ]);

        $orm = new TinhTrang();
        $orm->tinhtrang = $request->tinhtrang;
        $orm->save();

        // Sau khi thêm thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.tinhtrang');
    }

    public function getEdit($id)
    {
        $tinhtrang = TinhTrang::find($id);
        return view('admin.tinhtrang.sua', compact('tinhtrang'));
    }

    public function postEdit(Request $request, $id)
    {
        // Kiểm tra
        $request->validate([
            'tinhtrang' => ['required', 'string', 'max:191', 'unique:tinhtrang,tinhtrang,' . $id],
        ]);

        $orm = TinhTrang::find($id);
        $orm->tinhtrang = $request->tinhtrang;
        $orm->save();

        // Sau khi sửa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.tinhtrang');
    }

    public function getDelete($id)
    {
        $orm = TinhTrang::find($id);
        $orm->delete();

        // Sau khi xóa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.tinhtrang');
    }
}
