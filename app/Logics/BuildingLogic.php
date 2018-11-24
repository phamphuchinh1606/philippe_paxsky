<?php

namespace App\Logics;
use App\Models\Building;
use App\Common\Constant;

class BuildingLogic extends BaseLogic{

    public function find($id){
        return Building::find($id);
    }

    public function getAll(){
        return Building::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function create($buildingInfo = []){
        if(isset($buildingInfo) && count($buildingInfo) > 0){
            return Building::create($buildingInfo);
        }
        return null;
    }

    public function save(Building $building){
        if(isset($building)){
            return $building->save();
        }
        return null;
    }
}
