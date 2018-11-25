<?php

namespace App\Logics;
use App\Models\BuildingImage;
use App\Common\Constant;

class BuildingImageLogic extends BaseLogic{

    public function findId($imageId){
        return BuildingImage::find($imageId);
    }

    public function getListImageByBuildingId($buildingId){
        return BuildingImage::where('building_id',$buildingId)->get();
    }

    public function create($buildingId, $srcImage, $sort){
        $buildingImage = new BuildingImage();
        $buildingImage->building_id = $buildingId;
        $buildingImage->src_image = $srcImage;
        $buildingImage->sort = $sort;
        $buildingImage->save();
        return $buildingImage;
    }

    public function delete($imageId){
        BuildingImage::destroy($imageId);
    }
}
