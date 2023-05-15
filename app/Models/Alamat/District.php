<?php

namespace App\Models\Alamat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $searchableColumns = ['code', 'name', 'city.name'];

    protected $table = 'indonesia_districts';

    public function city()
    {
        return $this->belongsTo('Laravolt\Indonesia\Models\City', 'city_code', 'code');
    }

    public function villages()
    {
        return $this->hasMany('Laravolt\Indonesia\Models\Village', 'district_code', 'code');
    }

    public function alamat(){
        return $this->hasMany(Alamat::class, 'distrik_id', 'id');
    }

    public function getCityNameAttribute()
    {
        return $this->city->name;
    }

    public function getProvinceNameAttribute()
    {
        return $this->city->province->name;
    }
}
