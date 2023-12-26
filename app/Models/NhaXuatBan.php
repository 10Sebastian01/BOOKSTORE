<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class NhaXuatBan extends Model
{
    protected $table = 'nhaxuatban';
    public function Sach(): HasMany
    {
        return $this->hasMany(Sach::class, 'nhaxuatban_id', 'id');
    }
}
