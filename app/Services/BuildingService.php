<?php

namespace App\Services;
use App\Common\{Constant, ImageCommon};
use App\Models\{Building, BuildingImage};
use App\Logics\{BuildingLogic, BuildingImageLogic};
use App\Common\AppCommon;
use Illuminate\Http\Request;
use Storage;
use Image;

class BuildingService extends BaseService{
    private $buildingLogic;

    private $buildingImageLogic;

    public function __construct(BuildingLogic $buildingLogic, BuildingImageLogic $buildingImageLogic)
    {
        $this->buildingLogic = $buildingLogic;
        $this->buildingImageLogic = $buildingImageLogic;
    }

    public function find($id){
        return $this->buildingLogic->find($id);
    }

    private function getStructureStr(Building $building){
        $strStructure = "";
        if($building->basement_number > 0){
            $strStructure = $strStructure . " " .$building->basement_number . " hầm";
        }
        if($building->mezzanine_number > 0){
            $strStructure = $strStructure . " " . $building->mezzanine_number . " trệt";
        }
        if($building->ground_floor_number > 0){
            $strStructure = $strStructure . " " . $building->ground_floor_number . " lửng";
        }
        if($building->floor_number > 0){
            $strStructure = $strStructure . " " . $building->floor_number . " tầng";
        }
        if($building->floor_number > 0){
            $strStructure = $strStructure . " " . $building->floor_number . " sân thượng";
        }
        return $strStructure;
    }

    public function getAll(){
        $buildings =  $this->buildingLogic->getAll();
        foreach ($buildings as $building){
            $building->public_name = AppCommon::namePublicBuildingType($building->is_public);
            $building->public_class = AppCommon::classPublicBuildingType($building->is_public);
            $acreageRents = [];
            foreach ($building->offices as $office){
                if(!isset($acreageRents[$office->acreage_rent])){
                    $acreageRents[$office->acreage_rent] = $office->acreage_rent;
                }
            }
            $building->acreage_rent_list = implode("-",$acreageRents);
            $building->structure_str = $this->getStructureStr($building);
        }
        return $buildings;
    }

    public function searchBuilding($districtId, $acreage, $directionId, $rentCost){
        $buildings =  $this->buildingLogic->searchBuilding($districtId, $acreage, $directionId, $rentCost);
        $acreageRentArray = [];
        $directionArray = [];
        $directionObjectArray = [];
        $minRentCost = 0;
        $maxRentCost = 0;
        $minAcreage = 0;
        $maxAcreage = 0;
        foreach ($buildings as $building){
            $building->public_name = AppCommon::namePublicBuildingType($building->is_public);
            $building->public_class = AppCommon::classPublicBuildingType($building->is_public);
            $acreageRents = [];
            foreach ($building->offices as $office){
                if(!isset($acreageRents[$office->acreage_rent])){
                    $acreageRents[$office->acreage_rent] = $office->acreage_rent;
                }
                if(!in_array($office->acreage_rent,$acreageRentArray)){
                    $acreageRentArray[] = $office->acreage_rent;
                }
                if($minAcreage == 0 || $minAcreage >= $office->acreage_rent ){
                    $minAcreage = $office->acreage_rent;
                }
                if($maxAcreage == 0 || $maxAcreage <= $office->acreage_rent ){
                    $maxAcreage = $office->acreage_rent;
                }
            }
            $rentCostAndVaxManager = $building->rental_cost + $building->manager_cost + $building->electricity_cost;
            if($minRentCost == 0 || $minRentCost >= $rentCostAndVaxManager ){
                $minRentCost = $rentCostAndVaxManager;
            }
            if($maxRentCost == 0 || $maxRentCost <= $rentCostAndVaxManager ){
                $maxRentCost = $rentCostAndVaxManager;
            }
            if(!isset($directionArray[$building->direction_id])){
                $directionArray[$building->direction_id] = $building->direction->name;
                $directionItem = new \StdClass();
                $directionItem->direction_id = $building->direction_id;
                $directionItem->direction_name = $building->direction->name;
                $directionObjectArray[] = $directionItem;
            }
            $building->acreage_rent_list = implode("-",$acreageRents);
            $building->acreage_rent_array = array_values($acreageRents);
            $building->structure_str = $this->getStructureStr($building);
        }
        $data = new \StdClass();
        $data->buildings = $buildings;
        $data->minRentCost = $minRentCost;
        $data->maxRentCost = $maxRentCost;
        $data->minAcreage = $minAcreage;
        $data->maxAcreage = $maxAcreage;
        $data->directionArray = $directionObjectArray;
        $data->acreageRentArray = $acreageRentArray;
        return $data;
    }

    private function getInfoBuilding(Request $request, $building = null){
        if(!isset($building)){
            $building = new Building();
        }
        //Basic Info
        $building->is_public = AppCommon::getIsPublic($request->is_public);
        $building->name = $request->name;
        $building->sub_name = $request->sub_name;
        $building->investor_id = $request->investor_id;
        $building->classify_id = $request->classify_id;
        $building->management_agency_id = $request->management_agency_id;
        $building->structure = $request->structure;
        $building->basement_number = $request->basement_number;
        $building->ground_floor_number = $request->ground_floor_number;
        $building->mezzanine_number = $request->mezzanine_number;
        $building->floor_number = $request->floor_number;
        $building->rooftop_floor_number = $request->rooftop_floor_number;
        $building->acreage_total = $request->acreage_total;
        $building->acreage_rent_total = $request->acreage_rent_total;
        $building->floor_area = $request->floor_area;
        $building->length_width_floor = $request->length_width_floor;
        //Location
        $building->province_id = $request->province_id;
        $building->district_id = $request->district_id;
        $building->address = $request->address;
        $building->acreage_rent_total = $request->acreage_rent_total;
        $building->direction_id = $request->direction_id;
        $building->long = $request->long;
        $building->lat = $request->lat;
        //Rental Cost
        $building->rental_cost = is_null($request->rental_cost) ? 0 : $request->rental_cost;
        $building->tax_cost = is_null($request->tax_cost) ? 0 : $request->tax_cost;
        $building->manager_cost = is_null($request->manager_cost) ? 0 : $request->manager_cost;
        $building->electricity_cost = is_null($request->electricity_cost) ? 0 : $request->electricity_cost;
        $building->over_time_cost = is_null($request->over_time_cost) ? 0 : $request->over_time_cost;

        $building->parking_fee_bike = is_null($request->parking_fee_bike) ? 0 : $request->parking_fee_bike;
        $building->parking_fee_car = is_null($request->parking_fee_car) ? 0 : $request->parking_fee_car;
        $building->contract_duration = is_null($request->contract_duration) ? 0 : $request->contract_duration;
        $building->mode_of_deposit = is_null($request->mode_of_deposit) ? 0 : $request->mode_of_deposit;
        $building->mode_of_payment = is_null($request->mode_of_payment) ? 0 : $request->mode_of_payment;
        $building->number_of_vehicles = is_null($request->number_of_vehicles) ? 0 : $request->number_of_vehicles;

        //Content
        $building->description = $request->description;
        $building->content = $request->building_content;
        $building->notes = $request->notes;
        return $building;
    }

    public function create(Request $request){
        $building = $this->getInfoBuilding($request);
        $buildingDB = $this->buildingLogic->save($building);
        if(isset($buildingDB->id)){
            $buildingId = $buildingDB->id;
            $buildingImage = $request->file('building_main_image') ;
            if(isset($buildingImage)){
                $imageName = AppCommon::moveImageBuilding($buildingImage, $buildingId);
                $imageThumbnail = ImageCommon::moveImageBuildingThumbnail($buildingImage, $buildingId);
                $building->main_image = $imageName;
                $building->main_image_thumbnail = $imageThumbnail;
                $building = $this->buildingLogic->save($building);
            }
            $buildingImages = $request->building_images;
            if(isset($buildingImages) && count($buildingImages) > 0){
                foreach ($buildingImages as $indexImage => $image){
                    if(isset($image)){
                        $moveImageName = str_replace(Constant::$PATH_FOLDER_UPLOAD_IMAGE_DROP,Constant::$PATH_FOLDER_UPLOAD_BUILDING.'/'.$buildingId, $image);
                        Storage::move($image, $moveImageName);
                        $this->buildingImageLogic->create($buildingId,$moveImageName, $indexImage);
                    }
                }
            }
        }
        return $building;
    }

    public function update($id, Request $request){
        $buildingDB = $this->buildingLogic->find($id);
        if(isset($buildingDB)){
            $building = $this->getInfoBuilding($request, $buildingDB);
            $buildingImage = $request->file('building_main_image') ;
            if(isset($buildingImage)){
                AppCommon::deleteImage($building->main_image);
                AppCommon::deleteImage($building->main_image_thumbnail);
                $imageName = AppCommon::moveImageBuilding($buildingImage, $id);
                $imageThumbnail = ImageCommon::moveImageBuildingThumbnail($buildingImage, $id);
                $building->main_image = $imageName;
                $building->main_image_thumbnail = $imageThumbnail;
            }
            $buildingDB = $this->buildingLogic->save($building);
        }
        return $buildingDB;
    }

    public function destroy($id){
        $buildingType = $this->buildingLogic->find($id);
        if(isset($buildingType)){
            $buildingType->is_delete = Constant::$DELETE_FLG_ON;
            $this->buildingLogic->save($buildingType);
        }
    }

    public function buildThumbnailBuilding(){
        $buildings = $this->buildingLogic->getAll();
        foreach ($buildings as $building){
            if(!isset($building->main_image_thumbnail)){
                $buildingDB = $this->buildingLogic->find($building->id);
                if(isset($buildingDB)){
                    $imageThumbnail = ImageCommon::movePathImageBuildingThumbnail($buildingDB->main_image,$buildingDB->id);
                    $buildingDB->main_image_thumbnail = $imageThumbnail;
                    $this->buildingLogic->save($buildingDB);
                }
            }
        }
    }

}
