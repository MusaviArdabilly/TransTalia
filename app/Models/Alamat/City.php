<?php

namespace App\Models\Alamat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'indonesia_cities';

    protected $searchableColumns = ['code', 'name', 'province.name'];

    public function province()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\Province', 'province_code', 'code');
    }

    public function districts()
    {
        return $this->hasMany('Laravolt\Indonesia\Models\District', 'city_code', 'code');
    }

    public function alamat(){
        return $this->hasMany(Alamat::class, 'kota_id', 'id');
    }

    public function villages()
    {
        return $this->hasManyThrough(
            'Laravolt\Indonesia\Models\Village',
            'Laravolt\Indonesia\Models\District',
            'city_code',
            'district_code',
            'code',
            'code'
        );
    }

    public function getProvinceNameAttribute()
    {
        return $this->province->name;
    }

    public function getLogoPathAttribute()
    {
        $folder = 'indonesia-logo/';
        $id = $this->getAttributeValue('id');
        $arr_glob = glob(public_path().'/'.$folder.$id.'.*');

        if (count($arr_glob) == 1) {
            $logo_name = basename($arr_glob[0]);

            return url($folder.$logo_name);
        }
    }
}
