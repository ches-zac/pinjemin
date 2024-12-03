<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'nama_barang'; // Ganti dengan nama kolom yang Anda gunakan, misalnya 'slug'
    }

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

    //relasi ke model lending
    public function lendings()
    {
        return $this->hasMany(Lending::class);
    }

}
