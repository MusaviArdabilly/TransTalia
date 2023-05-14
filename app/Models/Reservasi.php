<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    
    protected $table = 'reservasi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user__id',
        'armada_bus_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'tujuan',
        'total_harga',
        'dibayar',
        'status',
    ];
}
