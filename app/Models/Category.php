<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inventory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kategori'];

    // Relasi ke model Inventory
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
