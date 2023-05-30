<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Transaksi;

class Reservasi extends Model
{
    use HasFactory;
    
    protected $table = 'reservasi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode',
        'user_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'kota_jemput',
        'kota_tujuan',
        'total_harga',
        'dibayar',
        'status',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function transaksi():HasMany{
        return $this->hasMany(Transaksi::class);
    }

    public function reservasi_armada_bus():HasMany{
        return $this->hasMany(ReservasiArmadaBus::class);
    }
}
