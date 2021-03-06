<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeLayout extends Model
{
    public function building(){
        return $this->belongsTo('App\Models\Building','building_id');
    }

    public function direction(){
        return $this->belongsTo('App\Models\Direction','direction_id');
    }
}
