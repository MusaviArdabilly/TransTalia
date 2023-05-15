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

    protected $table = 'transaksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'reservasi_id',
        'armada_bus_id',
    ];

    public function jadwal():HasMany{
        $this->hasMany(Jadwal::class);
    }

    public function reservasi():BelongsTo{
        $this->belongsTo(Reservasi::class);
    }

    public function armada_bus():BelongsTo{
        $this->belongsTo(ArmadaBus::class);
    }
}
