<?php

namespace App\Http\Controllers\Api;

use App\Common\AppCommon;
use App\Common\ImageCommon;
use App\Common\NumberUtils;
use Illuminate\Http\Request;
use Validator;

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
//            $buildingItem->address = $building->address;
            $buildingItem->district = $building->district->label;
            $buildingItem->direction = $building->direction->name;
//            $buildingItem->classify_name = $building->classify->name;
            $buildingItem->rent_cost = $building->rental_cost + $building->manager_cost + $building->tax_cost;
//            $buildingItem->rental_cost = $building->rental_cost;
//            $buildingItem->tax_cost = $building->tax_cost;
//            $buildingItem->manager_cost = $building->manager_cost;
//            $buildingItem->electricity_cost = $building->electricity_cost;
//            $buildingItem->structure = $building->structure_str;
//            if($building->acreage_rent_list != ''){
//                $buildingItem->acreage_rent_list = $building->acreage_rent_list;
//            }else{
//                $buildingItem->acreage_rent_list = 'FULL';
//            }
            $buildingItem->acreage_rent_array = $building->acreage_rent_array;

//            $buildingItem->investor_id = $building->investor_id;
//            $buildingItem->investor_name = isset($building->investor) ? $building->investor->name : '';
//            $buildingItem->management_agence_id = $building->management_agency_id;
//            $buildingItem->management_agence_name = isset($building->managementAgency) ? $building->managementAgency->name : '';
//            $buildingItem->acreage_total = $building->acreage_total;
//            $buildingItem->acreage_rent_total = $building->acreage_rent_total;
            $buildingItem->long = AppCommon::nullToEmpty($building->long);
            $buildingItem->lat = AppCommon::nullToEmpty($building->lat);
//            $buildingItem->over_time_cost = $building->over_time_cost;
//            $buildingItem->parking_fee_bike = $building->parking_fee_bike;
//            $buildingItem->parking_fee_car = $building->parking_fee_car;
//            $buildingItem->contract_duration = $building->contract_duration;
//            $buildingItem->mode_of_deposit = $building->mode_of_deposit;
//            $buildingItem->mode_of_payment = $building->mode_of_payment;
//            $buildingItem->number_of_vehicles = $building->number_of_vehicles;
//            $buildingItem->notes = AppCommon::nullToEmpty($building->notes);
//            $buildingItem->description = AppCommon::nullToEmpty($building->description);
//            $buildingItem->content = AppCommon::nullToEmpty($building->content);

            $listResult[] = $buildingItem;
        }
        $result = new \StdClass();
        $result->buildings = $listResult;
//        $result->min_rent_cost = $data->minRentCost;
//        $result->max_rent_cost = $data->maxRentCost;
        $result->rent_cost_array = [$data->minRentCost,$data->maxRentCost];
        $result->min_acreage = $data->minAcreage;
        $result->max_acreage = $data->maxAcreage;
        $result->direction_array = $data->directionArray;
        $result->acreage_rent_array = $data->acreageRentArray;
        return $this->json($result);
    }

    public function detail(Request $request){
        $rules = array(
            'building_id' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $building = $this->buildingService->find($request->building_id);
        if(isset($building)){
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

            $buildingItem->investor_id = $building->investor_id;
            $buildingItem->investor_name = isset($building->investor) ? $building->investor->name : '';
            $buildingItem->management_agence_id = $building->management_agency_id;
            $buildingItem->management_agence_name = isset($building->managementAgency) ? $building->managementAgency->name : '';
            $buildingItem->acreage_total = $building->acreage_total;
            $buildingItem->acreage_rent_total = $building->acreage_rent_total;
            $buildingItem->long = AppCommon::nullToEmpty($building->long);
            $buildingItem->lat = AppCommon::nullToEmpty($building->lat);
            $buildingItem->over_time_cost = $building->over_time_cost;
            $buildingItem->parking_fee_bike = $building->parking_fee_bike;
            $buildingItem->parking_fee_car = $building->parking_fee_car;
            $buildingItem->contract_duration = $building->contract_duration;
            $buildingItem->mode_of_deposit = $building->mode_of_deposit;
            $buildingItem->mode_of_payment = $building->mode_of_payment;
            $buildingItem->number_of_vehicles = $building->number_of_vehicles;
            $buildingItem->notes = AppCommon::nullToEmpty($building->notes);
            $buildingItem->description = AppCommon::nullToEmpty($building->description);
            $buildingItem->content = AppCommon::nullToEmpty($building->content);

            $images = [];
            foreach ($building->images as $image){
                $images[] = ImageCommon::showImage($image->src_image);
            }
            $buildingItem->sub_images = $images;

            return $this->json($buildingItem);
        }
        return $this->jsonError('Building not exit');
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
