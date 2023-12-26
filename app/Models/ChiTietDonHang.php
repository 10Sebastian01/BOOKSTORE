<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChiTietDonHang extends Model
{
    protected $table = 'chitietdonhang'; // Tên bảng trong cơ sở dữ liệu

    public function DonHang(): BelongsTo
    {
        return $this->belongsTo(DonHang::class, 'donhang_id', 'id');
    }

    public function Sach(): BelongsTo
    {
        return $this->belongsTo(Sach::class, 'sach_id', 'id');
    }

}
