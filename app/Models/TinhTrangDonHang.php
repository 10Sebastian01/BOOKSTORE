<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class TinhTrangDonHang extends Model
{
    protected $table = 'tinhtrang';
    public function DonHang(): HasMany
    {
        return $this->hasMany(DonHang::class, 'tinhtrang_id', 'id');
    }
}
