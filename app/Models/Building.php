<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function buildingType(){
        return $this->belongsTo('App\Models\BuildingType','type_id');
    }

    public function images(){
        return $this->hasMany('App\Models\BuildingImage','building_id');
    }

    public function direction(){
        return $this->belongsTo('App\Models\Direction','direction_id');
    }
}
