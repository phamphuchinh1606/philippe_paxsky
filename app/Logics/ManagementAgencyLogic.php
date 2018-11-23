<?php

namespace App\Logics;
use App\Models\ManagementAgency;
use App\Common\Constant;

class ManagementAgencyLogic extends BaseLogic{

    public function find($id){
        return ManagementAgency::find($id);
    }

    public function getAll(){
        return ManagementAgency::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function create($managementAgencyName){
        return ManagementAgency::create([
            'name' => $managementAgencyName
        ]);
    }

    public function save(ManagementAgency $managementAgency){
        if(isset($managementAgency)){
            return $managementAgency->save();
        }
        return null;
    }
}
