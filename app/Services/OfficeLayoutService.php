<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\OfficeLayoutLogic;
use App\Models\OfficeLayout;
use Illuminate\Http\Request;
use App\Common\AppCommon;

class OfficeLayoutService extends BaseService{
    private $officeLayoutLogic;

    public function __construct(OfficeLayoutLogic $officeLayoutLogic)
    {
        $this->officeLayoutLogic = $officeLayoutLogic;
    }

    public function find($id){
        return $this->officeLayoutLogic->find($id);
    }

    public function getAll(){
        return $this->officeLayoutLogic->getAll();
    }

    private function getOfficeInfo(Request $request, $office = null){
        if(!isset($office)){
            $office = new OfficeLayout();
        }
        $office->layout_name = $request->layout_name;
        $office->building_id = $request->building_id;
        $office->acreage_total = $request->acreage_total;
        $office->acreage_rent = $request->acreage_rent;
        $office->structure = $request->structure;
        $office->door_number = $request->door_number;
        $office->direction_id = $request->direction_id;
        $office->length_floor = $request->length_floor;
        $office->width_floor = $request->width_floor;
        return $office;
    }

    public function create(Request $request){
        $office = $this->getOfficeInfo($request);
        $officeDb = $this->officeLayoutLogic->save($office);
        if(isset($officeDb->id)){
            $officeId = $officeDb->id;
            $officeImage = $request->file('image_src') ;
            if(isset($officeImage)){
                $imageName = AppCommon::moveImage($officeImage, Constant::$PATH_FOLDER_UPLOAD_OFFICE_LAYOUT.'/'.$officeId);
                $officeDb->image_src = $imageName;
                $office = $this->officeLayoutLogic->save($officeDb);
            }
        }
        return $office;
    }

    public function update($id, $request){
        $officeDb = $this->officeLayoutLogic->find($id);
        if(isset($officeDb)){
            $office = $this->getOfficeInfo($request,$officeDb);
            $officeImage = $request->file('image_src') ;
            if(isset($officeImage)){
                AppCommon::deleteImage($officeDb->image_src);
                $imageName = AppCommon::moveImageBuilding($officeImage, $id);
                $office->image_src = $imageName;
            }
            $office = $this->officeLayoutLogic->save($office);
        }
    }

    public function destroy($id){
        $office = $this->officeLayoutLogic->find($id);
        if(isset($office)){
            $office->is_delete = Constant::$DELETE_FLG_ON;
            $this->officeLayoutLogic->save($office);
        }
    }

}
