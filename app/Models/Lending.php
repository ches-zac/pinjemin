<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lending extends Model
{
    use HasFactory, Notifiable;

    public function getRouteKeyName()
    {
        return 'tanggal_peminjaman'; // Ganti dengan nama kolom yang Anda gunakan, misalnya 'slug'
    }

    protected $fillable = [
        'user_id',
        'inventory_id',
        'ruangan',
        'jam',
        'tanggal_peminjaman',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
