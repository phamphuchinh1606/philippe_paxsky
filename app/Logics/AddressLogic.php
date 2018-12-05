<?php

namespace App\Logics;

use App\Models\{Country, Province, District};

class AddressLogic extends BaseLogic{
    public function createCountry($countryCode, $countryName, $label, $value){
        $country = new Country();
        $country->country_code = $countryCode;
        $country->country_name = $countryName;
        $country->lable = $label;
        $country->value = $value;
        $country->save();
        return $country;
    }

    public function createProvince($code, $label,$lat, $lon, $name, $countryCode){
        $province = new Province();
        $province->code = $code;
        $province->label = $label;
        $province->lat = $lat;
        $province->lon = $lon;
        $province->name = $name;
        $province->country_code = $countryCode;
        $province->save();
        return $province;
    }

    public function createDistrict($code, $label, $lat, $lon, $name, $provinceCode){
        $district = new District();
        $district->code = $code;
        $district->label = $label;
        $district->lat = $lat;
        $district->lon = $lon;
        $district->name = $name;
        $district->province_code = $provinceCode;
        $district->save();
        return $district;
    }

    public function getProvinceAll(){
        return Province::all();
    }

    public function getProvinceById($provinceId){
        return Province::whereId($provinceId)->first();
    }

    public function getProvinceByCode($code){
        return Province::whereCode($code)->first();
    }

    public function getDistrictByProvinceCode($provinceCode){
        return District::whereProvinceCode($provinceCode)->orderBy('label')->get();
    }

    public function getDistrictByProvinceId($provinceId){
        return District::where($provinceId)->orderBy('label')->get();
    }
}
