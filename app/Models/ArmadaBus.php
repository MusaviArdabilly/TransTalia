<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class ArmadaBus extends Model
{
    use HasFactory, Sortable;
    
    protected $table = 'armada_bus';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'kursi',
        'sassis',
        'mesin',
        'warna',
        'plat_nomor',
        'gps'
    ];

    public $sortable = ['nama','kursi','sassis','mesin','warna','plat_nomor'];
}
