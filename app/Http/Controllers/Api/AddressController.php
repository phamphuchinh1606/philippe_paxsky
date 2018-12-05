<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Validator;

class AddressController extends ControllerApi
{
    public function provinceList(){
        $provinces = $this->addressService->getProvinceAll();
        $listResult = [];
        foreach ($provinces as $province){
            $provinceItem = new \StdClass();
            $provinceItem->province_id = $province->id;
            $provinceItem->province_name = $province->label;
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
            $districts = $this->addressService->getDistrictByProvinceCode($province->code);
            foreach ($districts as $district){
                $districtItem = new \StdClass();
                $districtItem->district_id = $district->id;
                $districtItem->district_name = $district->label;
                $listResult[] = $districtItem;
            }
        }
        return $this->json($listResult);
    }
}
