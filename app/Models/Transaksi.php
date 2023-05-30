<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reservasi;
use Kyslik\ColumnSortable\Sortable;

class Transaksi extends Model
{
    use HasFactory, Sortable;

    protected $table = 'transaksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'reservasi_id',
        'nominal',
        'keterangan',
    ];

    public $sortable = ['reservasi.kode', 'nominal', 'keterangan'];

    public function reservasi():BelongsTo{
        return $this->belongsTo(Reservasi::class);
    }
}
