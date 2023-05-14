<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembaruanArmada extends Model
{
    use HasFactory;

    protected $table = 'pembaruan_armada';

    protected $primaryKey = 'id';

    protected $fillable = [
        'armada_bus_id',
        'pembaruan',
    ];
}
