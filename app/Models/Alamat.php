<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;
use App\Models\Alamat\Province;
use App\Models\Alamat\City;
use App\Models\Alamat\District;
use App\Models\Alamat\Village;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamat';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kota_id', 
        'distrik_id', 
        'desa_id', 
    ];

    public function pegawai():HasMany{
        return $this->hasMany(Pegawai::class);
    }

    public function city():BelongsTo{
    	return $this->belongsTo(City::class, 'kota_id', 'id');
    }

    public function district():BelongsTo{
    	return $this->belongsTo(District::class, 'distrik_id', 'id');
    }

    public function village():BelongsTo{
    	return $this->belongsTo(Village::class, 'desa_id', 'id');
    }

    // public function city():BelongsTo{
    // 	return $this->belongsTo(City::class, 'kode_kota', 'code');
    // }

    // public function district():BelongsTo{
    // 	return $this->belongsTo(District::class, 'kode_distrik', 'code');
    // }

    // public function village():BelongsTo{
    // 	return $this->belongsTo(Village::class, 'kode_desa', 'code');
    // }
}
