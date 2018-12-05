<?php

namespace App\Http\Controllers\Api;

use App\Common\ImageCommon;
use Illuminate\Http\Request;
use Validator;

class OfficeController extends ControllerApi
{
    public function listOffice(Request $request){
        $rules = array(
            'building_id' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $offices = $this->officeService->getOfficeByBuilding($request->building_id);
        $listResult = [];
        foreach ($offices as $office)
        {
            $officeItem = new \StdClass();
            $officeItem->office_id = $office->id;
            $officeItem->office_name = $office->office_name;
            $officeItem->building_id = $office->building_id;
            $officeItem->floor_name = $office->floor_name;
            $officeItem->direction = $office->direction->name;
            $officeItem->acreage_total = $office->acreage_total;
            $officeItem->acreage_rent = $office->acreage_rent;
            $officeItem->image_src = ImageCommon::showImage($office->image_src);
            $listResult[] = $officeItem;
        }
        return $this->json($listResult);
    }
}
