<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksins extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'vaksin';
    public $timestamps = false;

    public function vaksinfaskeslist(){
        return $this->hasMany('App\Models\FaskesVaksins', 'vaksin_id', 'id');
    }
}
