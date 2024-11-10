<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Lending extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'inventory_id',
        'ruangan',
        'jam',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
    ];
}
