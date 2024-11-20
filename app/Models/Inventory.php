<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //field yang bisa diisi
    protected $fillable = [
        'nama_barang',
        'category_id',
        'kuota'
    ];

    // Relasi ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
