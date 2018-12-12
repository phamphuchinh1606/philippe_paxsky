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
        $rentCost = $request->rent_cost;
        $data = $this->buildingService->searchBuilding($districtId,$acreage,$directionId,$rentCost);
        $buildings =  $data->buildings;
        $listResult = [];
        foreach ($buildings as $building)
        {
            $buildingItem = new \StdClass();
            $buildingItem->building_id = $building->id;
            $buildingItem->main_image = ImageCommon::showImage($building->main_image);
            $buildingItem->main_image_thumbnail = ImageCommon::showImage($building->main_image_thumbnail);
            $buildingItem->sub_name = $building->sub_name;
            $buildingItem->sub_name = $building->sub_name;
            $buildingItem->address = $building->address;
            $buildingItem->district = $building->district->label;
            $buildingItem->direction = $building->direction->name;
            $buildingItem->classify_name = $building->classify->name;
            $buildingItem->rent_cost = $building->rental_cost + $building->manager_cost + $building->tax_cost;
            $buildingItem->rental_cost = $building->rental_cost;
            $buildingItem->tax_cost = $building->tax_cost;
            $buildingItem->manager_cost = $building->manager_cost;
            $buildingItem->electricity_cost = $building->electricity_cost;
            $buildingItem->structure = $building->structure_str;
            if($building->acreage_rent_list != ''){
                $buildingItem->acreage_rent_list = $building->acreage_rent_list;
            }else{
                $buildingItem->acreage_rent_list = 'FULL';
            }
            $buildingItem->acreage_rent_array = $building->acreage_rent_array;
            $listResult[] = $buildingItem;
        }
        $result = new \StdClass();
        $result->buildings = $listResult;
        $result->min_rent_cost = $data->minRentCost;
        $result->max_rent_cost = $data->maxRentCost;
        $result->min_acreage = $data->minAcreage;
        $result->max_acreage = $data->maxAcreage;
        $result->direction_array = $data->directionArray;
        $result->acreage_rent_array = $data->acreageRentArray;
        return $this->json($result);
    }

    public function imageFirst(Request $request){
        $result = new \StdClass();
        if(isset($request->building_id)){
            $listImage = $this->buildingImageService->getImageByBuilding($request->building_id);
            if(isset($listImage) && count($listImage) > 0){
                $result->src_image = ImageCommon::showImage($listImage[0]->src_image);
            }else{
                $building = $this->buildingService->find($request->building_id);
                $result->src_image = ImageCommon::showImage($building->main_image);
            }
        }
        return $this->json($result);
    }
}
