<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArmadaBus;

class PembaruanArmada extends Model
{
    use HasFactory;

    protected $table = 'pembaruan_armada';

    protected $primaryKey = 'id';

    protected $fillable = [
        'armada_bus_id',
        'pembaruan',
    ];

    public function armada_bus():BelongsTo{
        return $this->belongsTo(ArmadaBus::class);
    }
}
