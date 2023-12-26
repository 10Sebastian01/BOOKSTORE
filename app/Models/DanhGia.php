<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DanhGia extends Model
{
    protected $table = 'danhgia'; // Tên bảng trong cơ sở dữ liệu

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sach(): BelongsTo
    {
        return $this->belongsTo(Sach::class, 'sach_id', 'id');
    }
}
