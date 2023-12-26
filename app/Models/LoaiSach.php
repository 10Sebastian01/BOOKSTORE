<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class LoaiSach extends Model
{
    protected $table = 'loaisach';

    public function sach():HasMany
    {
        return $this->hasMany(Sach::class, 'sach_id', 'id');
    }
}
