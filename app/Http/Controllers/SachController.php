<?php

namespace App\Http\Controllers;

use App\Models\NhaXuatBan;
use App\Models\Sach;
use Illuminate\Http\Request;

class SachController extends Controller
{
    public function getLists()
    {
        $sach = Sach::paginate(15);
        return view('admin.sach.danhsach', compact('sach'));
    }

    public function getAdd()
    {
        $loaisach = LoaiSach::all();
        $nhaxuatban = NhaXuatBan::all();
        return view('admin.sach.them', compact('loaisach', 'nhaxuatban'));
    }

    public function postAdd(Request $request)
    {
        // Kiểm tra
        $request->validate([
            'loaisach_id' => ['required'],
            'nhaxuatban_id' => ['required'],
            'tieudesach' => ['required', 'string', 'max:191', 'unique:sach'],
            'trangthai' => ['required'],
            'tacgia_id' => ['required'],
            'mota' => ['required', 'string', 'max:191', 'unique:sach'],
            'soluong' => ['required', 'numeric'],
            'giasach' => ['required', 'numeric'],
            'giasale' => ['required', 'numeric'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);

        // Upload hình ảnh
        $path = '';
        if($request->hasFile('hinhanh'))
        {
            // Tạo thư mục nếu chưa có
            $ls = LoaiSach::find($request->loaisach_id);
            File::isDirectory($ls->tenloai_slug) or Storage::makeDirectory($ls->tenloai_slug, 0775);

            // Xác định tên tập tin
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tieudesach, '-') . '.' . $extension;

            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs($ls->tenloai_slug, $request->file('hinhanh'), $filename);
        }

        $orm = new Sach();
        $orm->loaisach_id = $request->loaisach_id;
        $orm->nhaxuatban_id = $request->nhaxuatban_id;
        $orm->tieudesach = $request->tieudesach;
        $orm->tieudesach_slug = Str::slug($request->tensanpham, '-');
        $orm->trangthai = $request->trangthai;
        $orm->tacgia_id = $request->tacgia_id;
        $orm->mota = $request->mota;
        $orm->soluong = $request->soluong;
        $orm->giasach = $request->giasach;
        $orm->giasale = $request->giasale;
        if(!empty($path)) $orm->hinhanh = $path;
        $orm->save();

        // Sau khi thêm thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.sach');
    }

    public function getEdit($id)
    {
        $sach = Sach::find($id);
        $loaisach = LoaiSach::all();
        $nhaxuatban = NhaXuatBan::all();
        return view('admin.sach.sua', compact('sach', 'loaisach', 'nhaxuatban'));
    }

    public function postEdit(Request $request, $id)
    {
        // Kiểm tra
        $request->validate([
            'loaisach_id' => ['required'],
            'nhaxuatban_id' => ['required'],
            'tieudesach' => ['required', 'string', 'max:191', 'unique:sach'],
            'trangthai' => ['required'],
            'tacgia_id' => ['required'],
            'mota' => ['required', 'string', 'max:191', 'unique:sach'],
            'soluong' => ['required', 'numeric'],
            'giasach' => ['required', 'numeric'],
            'giasale' => ['required', 'numeric'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
        ]);

        $path = '';
        if($request->hasFile('hinhanh'))
        {
            // Xóa tập tin cũ
            $sp = Sach::find($id);
            if(!empty($sp->hinhanh)) Storage::delete($sp->hinhanh);

            // Xác định tên tập tin mới
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tieudesach, '-') . '.' . $extension;

            // Upload vào thư mục và trả về đường dẫn
            $lsp = LoaiSach::find($request->loaisach_id);
            $path = Storage::putFileAs($lsp->tenloai_slug, $request->file('hinhanh'), $filename);
        }

        $orm = SanPham::find($id);
        $orm->loaisach_id = $request->loaisach_id;
        $orm->nhaxuatban_id = $request->nhaxuatban_id;
        $orm->tieudesach = $request->tieudesach;
        $orm->tieudesach_slug = Str::slug($request->tieudesach, '-');
        $orm->soluong = $request->soluong;
        $orm->giasach = $request->giasach;
        $orm->giasale = $request->giasale;
        if(!empty($path)) $orm->hinhanh = $path;
        $orm->mota = $request->mota;
        $orm->save();

        // Sau khi sửa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.sanpham');
    }

    public function getDelete($id)
    {-
        $orm = Sach::find($id);
        $orm->delete();

        // Xóa tập tin khi xóa sản phẩm
        if(!empty($orm->hinhanh)) Storage::delete($orm->hinhanh);

        // Sau khi xóa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.sach');
    }
}
