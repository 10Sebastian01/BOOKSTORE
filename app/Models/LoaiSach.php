<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSach extends Model
{
    protected $table = 'loaisach';
    public function Sach():HasMany
{
    return $this->hasMany(Sach::class, 'loaisach_id', 'id');
}
    use HasFactory;
}
