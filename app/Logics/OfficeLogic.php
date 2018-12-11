<?php

namespace App\Logics;
use App\Models\Office;
use App\Models\OfficeStatus;
use App\Common\Constant;

class OfficeLogic extends BaseLogic{

    public function find($id){
        return Office::find($id);
    }

    public function getAll($limit = 20){
        return Office::whereIsDelete(Constant::$DELETE_FLG_OFF)->paginate($limit);
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

    public function searchOffice($buildingId , $officeName, $floor, $limit = 10){
        $query = Office::whereIsDelete(Constant::$DELETE_FLG_OFF);
        if(isset($buildingId) && !empty($buildingId)){
            $query->where('building_id',$buildingId);
        }
        if(isset($officeName) && !empty($officeName)){
            $query->whereRaw("office_name like '%$officeName%'");
        }
        if(isset($floor) && !empty($floor)){
            $query->where('floor',$floor);
        }
        return $query->paginate($limit);
    }
}
