<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReservasiArmadaBus;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $primaryKey = 'id';

    protected $fillable = [
        'reservasi_armada_bus_id',
    ];

    public function reservasi_armada_bus():BelongsTo{
        $this->belongsTo(ReservasiArmadaBus::class);
    }
}
