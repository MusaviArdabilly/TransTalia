<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\PerawatanArmada;

class KodePerawatan extends Model
{
    use HasFactory, Sortable;

    protected $table = 'kode_perawatan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode',
        'keterangan',
        'kategori'
    ];

    public $sortable = ['kode', 'keterangan', 'kategori'];

    public function perawatan_armada():HasMany{
        return $this->hasMany(KodePerawatan::class);
    }
}
