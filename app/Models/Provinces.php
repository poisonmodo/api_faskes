<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'provinces';
    public $timestamps = false;

    public function faskes(){
        return $this->hasOne('App\Models\Faskes', 'province_id', 'id');
    }
}
