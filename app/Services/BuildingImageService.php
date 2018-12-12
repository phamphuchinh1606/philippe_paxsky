<?php

namespace App\Services;
use App\Common\AppCommon;
use App\Logics\BuildingImageLogic;

class BuildingImageService extends BaseService{
    private $buildingImageLogic;

    public function __construct(BuildingImageLogic $buildingImageLogic)
    {
        $this->buildingImageLogic = $buildingImageLogic;
    }

    public function getImageByBuilding($buildingId){
        return $this->buildingImageLogic->getListImageByBuildingId($buildingId);
    }

    public function addImage($buildingId, $image){
        $imageName = AppCommon::moveImageBuilding($image, $buildingId);
        $this->buildingImageLogic->create($buildingId,$imageName,1);
    }

    public function deleteImage($imageId){
        $image = $this->buildingImageLogic->findId($imageId);
        if(isset($image)){
            AppCommon::deleteImage($image->src_image);
        }
        $this->buildingImageLogic->delete($imageId);
    }
}
