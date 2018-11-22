<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function buildingType(){
        return $this->belongsTo('App\Models\BuildingType','type_id');
    }

    public function buildingImage(){
        return $this->hasMany('App\Models\BuildingImage','id');
    }
}
