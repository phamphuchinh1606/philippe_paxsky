<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Validator;

class AddressController extends ControllerApi
{
    public function provinceList(){
        $provinces = $this->addressService->getProvinceAllAndCountBuilding();
        $listResult = [];
        foreach ($provinces as $province){
            $provinceItem = new \StdClass();
            $provinceItem->province_id = $province->id;
            $provinceItem->province_name = $province->label;
            $provinceItem->count_building = isset($province->count_building) ? $province->count_building : 0;
            $listResult[] = $provinceItem;
        }
        return $this->json($listResult);
    }

    public function districtList(Request $request){
        $rules = array(
            'province_id' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $province = $this->addressService->getProvinceById($request->province_id);
        $listResult = [];
        if(isset($province)){
            $districts = $this->addressService->getDistrictByCodeAndCountBuilding($province->code);
            foreach ($districts as $district){
                $districtItem = new \StdClass();
                $districtItem->district_id = $district->id;
                $districtItem->district_name = $district->label;
                $districtItem->count_building = isset($district->count_building) ? $district->count_building : 0;
                $listResult[] = $districtItem;
            }
        }
        return $this->json($listResult);
    }
}
