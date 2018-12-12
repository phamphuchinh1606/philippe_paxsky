<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\OfficeLogic;
use App\Models\Office;
use Illuminate\Http\Request;
use App\Common\AppCommon;
use App\Common\ImageCommon;

class OfficeService extends BaseService{
    private $officeLogic;

    public function __construct(OfficeLogic $officeLogic)
    {
        $this->officeLogic = $officeLogic;
    }

    public function find($id){
        return $this->officeLogic->find($id);
    }

    public function getAll(){
        $offices = $this->officeLogic->getAll();
        foreach ($offices as $office){
            $office->floor_name = AppCommon::getFloorNameOffice($office->floor);
        }
        return $offices;
    }

    public function getOfficeByBuilding($buildingId){
        $offices = $this->officeLogic->getOfficeByBuilding($buildingId);
        foreach ($offices as $office){
            $office->floor_name = AppCommon::getFloorNameOffice($office->floor);
        }
        return $offices;
    }

    public function getStatusAll(){
        return $this->officeLogic->getStatusAll();
    }

    private function getOfficeInfo(Request $request, $office = null){
        if(!isset($office)){
            $office = new Office();
        }
        $office->office_name = $request->office_name;
        $office->building_id = $request->building_id;
        $office->office_layout_id = $request->office_layout_id;
        $office->acreage_total = $request->acreage_total;
        $office->acreage_rent = $request->acreage_rent;
        $office->structure = $request->structure;
        $office->length_floor = $request->length_floor;
        $office->width_floor = $request->width_floor;
        $office->door_number = $request->door_number;
        $office->direction_id = $request->direction_id;
        $office->status_id = $request->status_id;
        $office->floor = $request->floor;
        return $office;
    }

    public function create(Request $request){
        $office = $this->getOfficeInfo($request);
        if($office->floor != null && count($office->floor) > 0){
            foreach ($office->floor as $floor){
                $officeClone = $office->replicate();
                $officeClone->floor = $floor;
                $officeDb = $this->officeLogic->save($officeClone);
                if(isset($officeDb->id)){
                    $officeId = $officeDb->id;
                    $officeImage = $request->file('image_src');
                    if(isset($officeImage)){
                        $imageName = AppCommon::moveImage($officeImage, Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$officeId);
                        $imageThumbnail = ImageCommon::moveImageOfficeThumbnail($officeImage, $officeId);
                        $officeDb->image_src = $imageName;
                        $officeDb->image_thumbnail_src = $imageThumbnail;
                        $office = $this->officeLogic->save($officeDb);
                    }else if(isset($request->image_src_office_layout)){
                        $pathFolderImageOfficeLayout = Constant::$PATH_FOLDER_UPLOAD_OFFICE_LAYOUT.'/'.$officeDb->office_layout_id;
                        $pathFolderDec = Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$officeId;
                        $pathDec = str_replace($pathFolderImageOfficeLayout,$pathFolderDec, $request->image_src_office_layout);
                        AppCommon::copyImage($request->image_src_office_layout, $pathDec);
                        $imageThumbnail = ImageCommon::movePathImageOfficeThumbnail($request->image_src_office_layout,$officeId);
                        $officeDb->image_src = $pathDec;
                        $officeDb->image_thumbnail_src = $imageThumbnail;
                        $office = $this->officeLogic->save($officeDb);
                    }
                }
            }
        }

        return $office;
    }

    public function update($id, $request){
        $officeDb = $this->officeLogic->find($id);
        if(isset($officeDb)){
            $office = $this->getOfficeInfo($request,$officeDb);
            if(count($office->floor) > 0)
                $office->floor = $office->floor[0];
            $officeId = $officeDb->id;
            $officeImage = $request->file('image_src');
            if(isset($officeImage)){
                AppCommon::deleteImage($officeDb->image_src);
                AppCommon::deleteImage($officeDb->image_thumbnail_src);
                $imageName = AppCommon::moveImage($officeImage, Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$id);
                $imageThumbnail = ImageCommon::moveImageOfficeThumbnail($officeImage, $officeId);
                $office->image_src = $imageName;
                $office->image_thumbnail_src = $imageThumbnail;
            }else if(isset($request->image_src_office_layout)){
                AppCommon::deleteImage($officeDb->image_src);
                AppCommon::deleteImage($officeDb->image_thumbnail_src);
                $pathFolderImageOfficeLayout = Constant::$PATH_FOLDER_UPLOAD_OFFICE_LAYOUT.'/'.$officeDb->office_layout_id;
                $pathFolderDec = Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$officeId;
                $pathDec = str_replace($pathFolderImageOfficeLayout,$pathFolderDec, $request->image_src_office_layout);
                AppCommon::copyImage($request->image_src_office_layout, $pathDec);
                $imageThumbnail = ImageCommon::movePathImageOfficeThumbnail($request->image_src_office_layout,$officeId);
                $office->image_src = $pathDec;
                $office->image_thumbnail_src = $imageThumbnail;
            }
            $office = $this->officeLogic->save($office);
        }
    }

    public function destroy($id){
        $office = $this->officeLogic->find($id);
        if(isset($office)){
            $office->is_delete = Constant::$DELETE_FLG_ON;
            $this->officeLogic->save($office);
        }
    }

    public function buildThumbnailOffice(){
        $offices = $this->officeLogic->getAll(1000);
        foreach ($offices as $office){
            if(!isset($office->image_thumbnail_src)){
                $officeDB = $this->officeLogic->find($office->id);
                if(isset($officeDB)){
                    $imageThumbnail = ImageCommon::movePathImageOfficeThumbnail($officeDB->image_src,$office->id);
                    $officeDB->image_thumbnail_src = $imageThumbnail;
                    $this->officeLogic->save($officeDB);
                }
            }
        }
    }

    public function searchOffice($buildingId , $officeName, $floor){
        $offices = $this->officeLogic->searchOffice($buildingId , $officeName, $floor, Constant::$OFFICE_STATUS_EMPTY);
        foreach ($offices as $office){
            $office->floor_name = AppCommon::getFloorNameOffice($office->floor);
            $office->building_name = $office->building->name;
        }
        return $offices;
    }

}
