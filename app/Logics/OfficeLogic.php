<?php

namespace App\Logics;
use App\Models\Office;
use App\Models\OfficeStatus;
use App\Common\Constant;

class OfficeLogic extends BaseLogic{

    public function find($id){
        return Office::find($id);
    }

    public function getAll(){
        return Office::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function getOfficeByBuilding($buildingId){
        return Office::whereIsDelete(Constant::$DELETE_FLG_OFF)->whereBuildingId($buildingId)->get();
    }

    public function save(Office $office){
        if(isset($office)){
            $office->save();
            return $office;
        }
        return null;
    }

    public function getStatusAll(){
        return OfficeStatus::all();
    }
}
