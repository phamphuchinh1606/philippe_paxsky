<?php

namespace App\Http\Controllers\Api;

use App\Common\ImageCommon;
use App\Common\NumberUtils;
use Illuminate\Http\Request;

class BuildingController extends ControllerApi
{
    public function list(Request $request){
        $districtId = $request->district_id;
        $acreage = $request->acreage;
        $directionId = $request->direction_id;
        $buildings = $this->buildingService->searchBuilding($districtId,$acreage,$directionId);
        $listResult = [];
        foreach ($buildings as $building)
        {
            $buildingItem = new \StdClass();
            $buildingItem->building_id = $building->id;
            $buildingItem->main_image = ImageCommon::showImage($building->main_image);
            $buildingItem->sub_name = $building->sub_name;
            $buildingItem->sub_name = $building->sub_name;
            $buildingItem->address = $building->address.','.$building->district->label;
            $buildingItem->direction = $building->direction->name;
            $buildingItem->classify_name = $building->classify->name;
            $buildingItem->rent_cost = $building->rental_cost + $building->manager_cost + $building->tax_cost;
            $buildingItem->electricity_cost = $building->electricity_cost;
            $buildingItem->structure = $building->structure_str;
            if($building->acreage_rent_list != ''){
                $buildingItem->acreage_rent_list = $building->acreage_rent_list;
            }else{
                $buildingItem->acreage_rent_list = 'FULL';
            }
            $listResult[] = $buildingItem;
        }
        return $this->json($listResult);
    }
}
