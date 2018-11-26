<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
//    public function clone(){
//        $office = new Office();
//        $office->office_name = $this->office_name;
//        $office->building_id = $this->building_id;
//        $office->office_layout_id = $this->office_layout_id;
//        $office->floor = $this->floor;
//        $office->acreage_total = $this->acreage_total;
//        $office->acreage_rent = $this->acreage_rent;
//        $office->structure = $this->structure;
//        $office->length_floor = $this->length_floor;
//        $office->width_floor = $this->width_floor;
//        $office->door_number = $this->door_number;
//        $office->image_src = $this->image_src;
//        return $office;
//    }

    public function building(){
        return $this->belongsTo('App\Models\Building','building_id');
    }

    public function direction(){
        return $this->belongsTo('App\Models\Direction','direction_id');
    }

    public function status(){
        return $this->belongsTo('App\Models\OfficeStatus','status_id');
    }
}
