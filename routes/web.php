<?php

use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\ChiTietDonHangController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\LoaiSachController;
use App\Http\Controllers\NhaXuatBanController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\TacGiaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TinhTrangDonHangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

//Trang chủ
Route::get('/', [HomeController::class, 'getHome'])->name('frontend');
Route::get('/home', [HomeController::class, 'getHome'])->name('frontend');

//Quản lý loại sách
Route::get('/loaisach', [LoaiSachController::class, 'getLists'])->name('loaisach');
Route::get('/loaisach/them', [LoaiSachController::class, 'getAdd'])->name('loaisach.them');
Route::post('/loaisach/them', [LoaiSachController::class, 'postAdd'])->name('loaisach.them');
Route::get('/loaisach/sua/{id}', [LoaiSachController::class, 'getEdit'])->name('loaisach.sua');
Route::post('/loaisach/sua/{id}', [LoaiSachController::class, 'postEdit'])->name('loaisach.sua');
Route::get('/loaisach/xoa/{id}', [LoaiSachController::class, 'getDelete'])->name('loaisach.xoa');


//Quản lý nhà xuất bản
Route::get('/nhaxuatban', [NhaXuatBanController::class, 'getLists'])->name('nhaxuatban');
Route::get('/nhaxuatban/them', [NhaXuatBanController::class, 'getAdd'])->name('nhaxuatban.them');
Route::post('/nhaxuatban/them', [NhaXuatBanController::class, 'postAdd'])->name('nhaxuatban.them');
Route::get('/nhaxuatban/sua/{id}', [NhaXuatBanController::class, 'getEdit'])->name('nhaxuatban.sua');
Route::post('/nhaxuatban/sua/{id}', [NhaXuatBanController::class, 'postEdit'])->name('nhaxuatban.sua');
Route::get('/nhaxuatban/xoa/{id}', [NhaXuatBanController::class, 'getDelete'])->name('nhaxuatban.xoa');

//Quản lý sách
Route::get('/sach', [SachController::class, 'getLists'])->name('sach');
Route::get('/sach/them', [SachController::class, 'getAdd'])->name('sach.them');
Route::post('/sach/them', [SachController::class, 'postAdd'])->name('sach.them');
Route::get('/sach/sua/{id}', [SachController::class, 'getEdit'])->name('sach.sua');
Route::post('/sach/sua/{id}', [SachController::class, 'postEdit'])->name('sach.sua');
Route::get('/sach/xoa/{id}', [SachController::class, 'getDelete'])->name('sach.xoa');

//Quản lý tình trạng
Route::get('/tinhtrang', [TinhTrangDonhangController::class, 'getLists'])->name('tinhtrang');
Route::get('/tinhtrang/them', [TinhTrangDonhangController::class, 'getAdd'])->name('tinhtrang.them');
Route::post('/tinhtrang/them', [TinhTrangDonhangController::class, 'postAdd'])->name('tinhtrang.them');
Route::get('/tinhtrang/sua/{id}', [TinhTrangDonhangController::class, 'getEdit'])->name('tinhtrang.sua');
Route::post('/tinhtrang/sua/{id}', [TinhTrangDonhangController::class, 'postEdit'])->name('tinhtrang.sua');
Route::get('/tinhtrang/xoa/{id}', [TinhTrangDonhangController::class, 'getDelete'])->name('tinhtrang.xoa');

//Quản lý đơn hàng
Route::get('/donhang', [DonHangController::class, 'getLists'])->name('donhang');
Route::get('/donhang/them', [DonHangController::class, 'getAdd'])->name('donhang.them');
Route::post('/donhang/them', [DonHangController::class, 'postAdd'])->name('donhang.them');
Route::get('/donhang/sua/{id}', [DonHangController::class, 'getEdit'])->name('donhang.sua');
Route::post('/donhang/sua/{id}', [DonHangController::class, 'postEdit'])->name('donhang.sua');
Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getDelete'])->name('donhang.xoa');

//Quản lý đánh giá
Route::get('/danhgia', [DanhGiaController::class, 'getLists'])->name('danhgia');
Route::get('/danhgia/them', [DanhGiaController::class, 'getAdd'])->name('danhgia.them');
Route::post('/danhgia/them', [DanhGiaController::class, 'postAdd'])->name('danhgia.them');
Route::get('/danhgia/sua/{id}', [DanhGiaController::class, 'getEdit'])->name('danhgia.sua');
Route::post('/danhgia/sua/{id}', [DanhGiaController::class, 'postEdit'])->name('danhgia.sua');
Route::get('/danhgia/xoa/{id}', [DanhGiaController::class, 'getDelete'])->name('danhgia.xoa');

//Quản lý tác giả
Route::get('/tacgia', [TacGiaController::class, 'getLists'])->name('tacgia');
Route::get('/tacgia/them', [TacGiaController::class, 'getAdd'])->name('tacgia.them');
Route::post('/tacgia/them', [TacGiaController::class, 'postAdd'])->name('tacgia.them');
Route::get('/tacgia/sua/{id}', [TacGiaController::class, 'getEdit'])->name('tacgia.sua');
Route::post('/tacgia/sua/{id}', [TacGiaController::class, 'postEdit'])->name('tacgia.sua');
Route::get('/tacgia/xoa/{id}', [TacGiaController::class, 'getDelete'])->name('tacgia.xoa');

// Quản lý Tài khoản người dùng
Route::get('/nguoidung', [UserController::class, 'getLists'])->name('nguoidung');
Route::get('/nguoidung/them', [UserController::class, 'getAdd'])->name('nguoidung.them');
Route::post('/nguoidung/them', [UserController::class, 'postAdd'])->name('nguoidung.them');
Route::get('/nguoidung/sua/{id}', [UserController::class, 'getEdit'])->name('nguoidung.sua');
Route::post('/nguoidung/sua/{id}', [UserController::class, 'postEdit'])->name('nguoidung.sua');
Route::get('/nguoidung/xoa/{id}', [UserController::class, 'getDelete'])->name('nguoidung.xoa');

