<?php

namespace App\Logics;
use App\Models\Building;
use App\Common\Constant;
use App\Models\Office;

class BuildingLogic extends BaseLogic{

    public function find($id){
        return Building::find($id);
    }

    public function getAll(){
        return Building::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function searchBuilding($districtId, $acreage, $directionId, $rentCost){
        $tableOfficeName = (new Office())->getTable();
        $buildingName = (new Building())->getTable();
        $query = Building::whereIsDelete(Constant::$DELETE_FLG_OFF);
        if(isset($directionId)){
            $query->where('direction_id', $directionId);
        }
        if(isset($districtId)){
            $query->where('district_id', $districtId);
        }
        if(isset($acreage)){
            $acreageFrom = 0;
            $acreageTo = 0;
            if(str_contains($acreage,'-')){
                $acreageFrom = explode('-',$acreage)[0];
                $acreageTo = explode('-',$acreage)[1];
            }else{
                $acreageFrom = $acreage;
                $acreageTo = 999999;
            }
            if(is_numeric ($acreageFrom) && is_numeric ($acreageTo)){
                $query->whereIn('id', function($query) use ($acreageFrom ,$acreageTo, $tableOfficeName) {
                    $query->select('building_id')
                        ->from($tableOfficeName)
                        ->where('acreage_rent','>=', $acreageFrom)
                        ->where('acreage_rent' , '<=' , $acreageTo)
                        ->whereIsDelete(Constant::$DELETE_FLG_OFF);
                });
            }
        }
        if(isset($rentCost)){
            $rentCostFrom = 0;
            $rentCostTo = 0;
            if(str_contains($rentCost,'-')){
                $rentCostFrom = explode('-',$rentCost)[0];
                $rentCostTo = explode('-',$rentCost)[1];
            }else{
                $rentCostFrom = $rentCost;
                $rentCostTo = 999999;
            }
            if(is_numeric ($rentCostFrom) && is_numeric ($rentCostTo)){
                $query->whereRaw("(rental_cost + manager_cost + tax_cost) >= $rentCostFrom");
                $query->whereRaw("(rental_cost + manager_cost + tax_cost) <= $rentCostTo");
            }
        }
        return $query->orderBy('created_at','desc')->get();
    }

    public function save(Building $building){
        if(isset($building)){
            $building->save();
        }
        return $building;
    }
}
