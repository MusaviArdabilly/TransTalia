<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservasiArmadaBus extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'reservasi_id',
        'armada_bus_id',
    ];
}
