<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    protected $table = 'giohang';

    public function Sach(): HasMany
    {
        return $this->hasMany(Sach::class, 'sach_id', 'id');
    }
}
