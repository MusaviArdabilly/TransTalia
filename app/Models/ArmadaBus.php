<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\ReservasiArmadaBus;
use App\Models\PembaruanArmada;
use App\Models\PerawatanArmada;

class ArmadaBus extends Model
{
    use HasFactory, Sortable;
    
    protected $table = 'armada_bus';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'gambar',
        'kursi',
        'sassis',
        'jenis_bus',
        'harga_sewa',
        'plat_nomor',
        'gps'
    ];

    public $sortable = ['nama','gambar','kursi','sassis','jenis_bus','harga_sewa','plat_nomor'];

    public function reservasi_armada_bus():HasMany{
        return $this->hasMany(ReservasiArmadaBus::class);
    }

    public function pembaruan_armada():HasMany{  
        return $this->hasMany(PembaruanArmada::class);
    }

    public function perawatan_armada():HasMany{
        return $this->hasMany(PerawatanArmada::class);
    }
}
