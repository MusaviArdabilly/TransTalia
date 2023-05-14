<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodePerawatan extends Model
{
    use HasFactory;

    protected $table = 'kode_perawatan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode',
        'keterangan',
        'kategori'
    ];
}
