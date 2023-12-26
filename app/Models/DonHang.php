<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'donhang';
    public function ChiTietDonHang(): HasMany
    {
        return $this->hasMany(ChiTietDonHang::class, 'donhang_id', 'id');
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function TinhTrangDonHang(): BelongsTo
    {
        return $this->belongsTo(TinhTrangDonHang::class, 'tinhtrang_id', 'id');

    }
}
