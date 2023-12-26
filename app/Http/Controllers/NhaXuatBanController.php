<?php

namespace App\Http\Controllers;

use App\Models\NhaXuatBan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NhaXuatBanController extends Controller
{
    public function getLists()
    {
        $nhaxuatban = NhaXuatBan::all();
        return view('nhaxuatban.danhsach', compact('nhaxuatban'));
    }

    public function getAdd()
    {
        return view('nhaxuatban.them');
    }
    public function postAdd(Request $request)
    {
        // Kiểm tra
        $request->validate([
            'tennxb' => ['required', 'string', 'max:191', 'unique:nhaxuatban'],
            'hinhanh' => ['nullable', 'image', 'max:1024']
        ]);

        // Upload hình ảnh
        $path = '';
        if($request->hasFile('hinhanh'))
        {
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tennxb, '-') . '.' . $extension;
            $path = Storage::putFileAs('nha-xuat-ban', $request->file('hinhanh'), $filename);
        }

        // Thêm
        $orm = new NhaXuatBan();
        $orm->tennxb = $request->tennxb;
        $orm->tennxb_slug = Str::slug($request->tennxb, '-');
        if(!empty($path)) $orm->hinhanh = $path;
        $orm->save();

        // Sau khi thêm thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.nhaxuatban');
    }
    public function getSua($id)
    {
        $hangsanxuat = HangSanXuat::find($id);
        return view('admin.hangsanxuat.sua', compact('hangsanxuat'));
    }

    public function postSua(Request $request, $id)
    {
        // Kiểm tra
        $request->validate([
            'tennxb' => ['required', 'string', 'max:191', 'unique:nhaxuatban,tennxb,' . $id],
            'hinhanh' => ['nullable', 'image', 'max:1024']
        ]);

        // Upload hình ảnh
        $path = '';
        if($request->hasFile('hinhanh'))
        {
            // Xóa file cũ
            $orm = NhaXuatBan::find($id);
            if(!empty($orm->hinhanh)) Storage::delete($orm->hinhanh);

            // Upload file mới
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tennxb, '-') . '.' . $extension;
            $path = Storage::putFileAs('nha-xuat-ban', $request->file('hinhanh'), $filename);
        }

        // Sửa
        $orm = NhaXuatBan::find($id);
        $orm->tennxb = $request->tennxb;
        $orm->tennxb_slug = Str::slug($request->tennxb, '-');
        if(!empty($path)) $orm->hinhanh = $path;
        $orm->save();

        // Sau khi sửa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.nhaxuatban');
    }
    public function getDelete($id)
    {
        $orm = NhaXuatBan::find($id);
        $orm->delete();

        // Xoá hình ảnh khi xóa dữ liệu
        if(!empty($orm->hinhanh)) Storage::delete($orm->hinhanh);

        // Sau khi xóa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.nhaxuatban');
    }
}
