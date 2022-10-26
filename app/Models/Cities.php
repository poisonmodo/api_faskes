<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
   
    protected $primaryKey = 'id';
    protected $table = 'cities';
    public $timestamps = false;
 
    public function faskes(){
        return $this->hasOne('App\Models\Faskes', 'city_id', 'id');
    }
}
