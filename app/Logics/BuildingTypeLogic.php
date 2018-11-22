<?php

namespace App\Logics;
use App\Models\BuildingType;
use App\Common\Constant;

class BuildingTypeLogic extends BaseLogic{

    public function find($id){
        return BuildingType::find($id);
    }

    public function getAll(){
        return BuildingType::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function create($buildingTypeName){
        return BuildingType::create([
            'type_name' => $buildingTypeName
        ]);
    }

    public function save(BuildingType $buildingType){
        if(isset($buildingType)){
            return $buildingType->save();
        }
        return null;
    }
}
