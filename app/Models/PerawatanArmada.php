<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArmadaBus;
use App\Models\KodePerawatan;

class PerawatanArmada extends Model
{
    use HasFactory;

    protected $table = 'perawatan_armada';

    protected $primaryKey = 'id';

    protected $fillable = [
        'armada_bus_id',
        'kode_perawatan_id',
    ];

    public function armada_bus():BelongsTo{
        return $this->belongsTo(ArmadaBus::class);
    }

    public function kode_perawatan():BelongsTo{
        return $this->belongsTo(KodePerawatan::class);
    }
}
