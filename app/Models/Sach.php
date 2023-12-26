<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sach extends Model
{
    protected $table = 'sach';
    public function ChiTietDonHang(): HasMany
    {
        return $this->hasMany(ChiTietDonHang::class, 'sach_id', 'id');
    }

    public function LoaiSach(): BelongsTo
    {
        return $this->belongsTo(LoaiSach::class, 'loaisach_id', 'id');
    }

    public function NhaXuatBan(): BelongsTo
    {
        return $this->belongsTo(NhaXuatBan::class, 'nhaxuatban_id', 'id');
    }
    Public function TacGia(): HasMany
    {
        return $this->hasMany(TacGia::class, 'tacgia_id', 'id');
    }
    public function DanhGia(): HasMany
    {
        return $this->hasMany(DanhGia::class, 'danhgia_id', 'id');
    }

}
