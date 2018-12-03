<?php

namespace App\Services;

use App\Logics\AddressLogic;

class AddressService extends BaseService{

    protected $addressLogic;

    public function __construct(AddressLogic $addressLogic)
    {
        $this->addressLogic = $addressLogic;
    }

    public function createCountry($countryCode, $countryName, $label, $value){
        return $this->addressLogic->createCountry($countryCode, $countryName, $label, $value);
    }

    public function createProvince($code, $label,$lat, $lon, $name, $countryCode){
        return $this->addressLogic->createProvince($code, $label, $lat, $lon, $name, $countryCode);
    }

    public function createDistrict($code, $label, $lat, $lon, $name, $provinceCode){
        return $this->addressLogic->createDistrict($code, $label, $lat, $lon, $name, $provinceCode);
    }

    public function getProvinceByCode($code){
        return $this->addressLogic->getProvinceByCode($code);
    }

    public function getProvinceAll(){
        return $this->addressLogic->getProvinceAll();
    }

    public function getDistrictByProvinceCode($provinceCode){
        return $this->addressLogic->getDistrictByProvinceCode($provinceCode);
    }

    public function getDistrictByProvinceId($provinceId){
        return $this->addressLogic->getDistrictByProvinceId($provinceId);
    }

}
