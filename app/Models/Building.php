<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{

    public function init(){
        $this->basement_number = 0;
        $this->mezzanine_number = 0;
        $this->ground_floor_number = 0;
        $this->floor_number = 0;
        $this->rooftop_floor_number = 0;
        $this->acreage_total = 0;
        $this->acreage_rent_total = 0;
        $this->floor_area = 0;

        $this->rental_cost = 0;
        $this->manager_cost = 0;
        $this->electricity_cost = 0;
        $this->tax_cost = 0;
        $this->over_time_cost = 0;
        $this->parking_fee_bike = 0;
        $this->parking_fee_car = 0;
        $this->contract_duration = 0;
        $this->mode_of_deposit = 0;
        $this->mode_of_payment = 0;
        $this->number_of_vehicles = 0;
    }

    public function buildingType(){
        return $this->belongsTo('App\Models\BuildingType','type_id');
    }

    public function images(){
        return $this->hasMany('App\Models\BuildingImage','building_id');
    }

    public function offices(){
        return $this->hasMany('App\Models\Office','building_id');
    }

    public function direction(){
        return $this->belongsTo('App\Models\Direction','direction_id');
    }

    public function classify(){
        return $this->belongsTo('App\Models\Classify','classify_id');
    }

    public function province(){
        return $this->belongsTo('App\Models\Province','province_id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }
}
