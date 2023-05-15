<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservasi;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'reservasi_id',
        'nominal',
        'keterangan',
    ];

    public function reservasi():BelongsTo{
        return $this->belongsTo(Reservasi::class);
    }
}
