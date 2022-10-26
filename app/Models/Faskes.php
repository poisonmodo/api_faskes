<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faskes extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'faskes';
    public $timestamps = false;

    public function faskesvaksinlist(){
        return $this->hasMany('App\Models\FaskesVaksins', 'faskes_id', 'id');
    }

    public function province(){
        return $this->hasOne('App\Models\Provinces', 'id', 'province_id');
    }

    public function city(){
        return $this->hasOne('App\Models\Cities', 'id', 'city_id');
    }
}
