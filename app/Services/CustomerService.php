<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\CustomerLogic;
use Illuminate\Http\Request;
use App\Common\AppCommon;

class CustomerService extends BaseService{
    private $customerLogic;

    public function __construct(CustomerLogic $customerLogic)
    {
        $this->customerLogic = $customerLogic;
    }

    public function find($id){
        return $this->customerLogic->find($id);
    }

    public function getAll(){
        $customers = $this->customerLogic->getAll();
//        foreach ($customers as $customer){
//            $customer->active_name = AppCommon::getActiveName($user->is_active);
//        }
        return $customers;
    }

    public function getGroupCustomerAll(){
        return $this->customerLogic->getGroupCustomerAll();
    }

//    private function getOfficeInfo(Request $request, $office = null){
//        if(!isset($office)){
//            $office = new Office();
//        }
//        $office->office_name = $request->office_name;
//        $office->building_id = $request->building_id;
//        $office->office_layout_id = $request->office_layout_id;
//        $office->acreage_total = $request->acreage_total;
//        $office->acreage_rent = $request->acreage_rent;
//        $office->structure = $request->structure;
//        $office->length_floor = $request->length_floor;
//        $office->width_floor = $request->width_floor;
//        $office->door_number = $request->door_number;
//        $office->direction_id = $request->direction_id;
//        $office->status_id = $request->status_id;
//        $office->floor = $request->floor;
//        return $office;
//    }
//
//    public function create(Request $request){
//        $office = $this->getOfficeInfo($request);
//        if($office->floor != null && count($office->floor) > 0){
//            foreach ($office->floor as $floor){
//                $officeClone = $office->replicate();
//                $officeClone->floor = $floor;
//                $officeDb = $this->officeLogic->save($officeClone);
//                if(isset($officeDb->id)){
//                    $officeId = $officeDb->id;
//                    $officeImage = $request->file('image_src');
//                    if(isset($officeImage)){
//                        $imageName = AppCommon::moveImage($officeImage, Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$officeId);
//                        $officeDb->image_src = $imageName;
//                        $office = $this->officeLogic->save($officeDb);
//                    }else if(isset($request->image_src_office_layout)){
//                        $pathFolderImageOfficeLayout = Constant::$PATH_FOLDER_UPLOAD_OFFICE_LAYOUT.'/'.$officeDb->office_layout_id;
//                        $pathFolderDec = Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$officeId;
//                        $pathDec = str_replace($pathFolderImageOfficeLayout,$pathFolderDec, $request->image_src_office_layout);
//                        AppCommon::copyImage($request->image_src_office_layout, $pathDec);
//                        $officeDb->image_src = $pathDec;
//                        $office = $this->officeLogic->save($officeDb);
//                    }
//                }
//            }
//        }
//
//        return $office;
//    }
//
//    public function update($id, $request){
//        $officeDb = $this->officeLogic->find($id);
//        if(isset($officeDb)){
//            $office = $this->getOfficeInfo($request,$officeDb);
//            if(count($office->floor) > 0)
//                $office->floor = $office->floor[0];
//            $officeId = $officeDb->id;
//            $officeImage = $request->file('image_src');
//            if(isset($officeImage)){
//                AppCommon::deleteImage($officeDb->image_src);
//                $imageName = AppCommon::moveImageBuilding($officeImage, $id);
//                $office->image_src = $imageName;
//            }else if(isset($request->image_src_office_layout)){
//                AppCommon::deleteImage($officeDb->image_src);
//                $pathFolderImageOfficeLayout = Constant::$PATH_FOLDER_UPLOAD_OFFICE_LAYOUT.'/'.$officeDb->office_layout_id;
//                $pathFolderDec = Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$officeId;
//                $pathDec = str_replace($pathFolderImageOfficeLayout,$pathFolderDec, $request->image_src_office_layout);
//                AppCommon::copyImage($request->image_src_office_layout, $pathDec);
//                $office->image_src = $pathDec;
//            }
//            $office = $this->officeLogic->save($office);
//        }
//    }
//
//    public function destroy($id){
//        $office = $this->officeLogic->find($id);
//        if(isset($office)){
//            $office->is_delete = Constant::$DELETE_FLG_ON;
//            $this->officeLogic->save($office);
//        }
//    }

}
