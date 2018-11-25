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

    public function save(Building $building){
        if(isset($building)){
            $building->save();
        }
        return $building;
    }
}
