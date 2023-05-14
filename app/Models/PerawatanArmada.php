<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerawatanArmada extends Model
{
    use HasFactory;

    protected $table = 'perawatan_armada';

    protected $primaryKey = 'id';

    protected $fillable = [
        'armada_bus_id',
        'kode_perawatan_id',
    ];
}
