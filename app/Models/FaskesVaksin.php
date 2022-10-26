<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaskesVaksin extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'faskes_vaksins';
    public $timestamps = false;

    public function vaksinlist(){
        return $this->hasOne('App\Models\Vaksins', 'id', 'vaksin_id');
    }

    public function faskeslist(){
        return $this->hasOne('App\Models\Faskes', 'id', 'faskes_id');
    }
}
