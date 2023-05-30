<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jadwal;
use App\Models\Reservasi;
use App\Models\ArmadaBus;

class ReservasiArmadaBus extends Model
{
    use HasFactory;

    protected $table = 'reservasi_armada_bus';

    protected $primaryKey = 'id';

    protected $fillable = [
        'reservasi_id',
        'armada_bus_id',
        'subtotal',
    ];

    public function jadwal():HasMany{
        return $this->hasMany(Jadwal::class);
    }

    public function reservasi():BelongsTo{
        return $this->belongsTo(Reservasi::class);
    }

    public function armada_bus():BelongsTo{
        return $this->belongsTo(ArmadaBus::class);
    }
}
