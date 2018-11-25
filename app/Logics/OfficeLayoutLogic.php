<?php

namespace App\Logics;
use App\Models\OfficeLayout;
use App\Common\Constant;

class OfficeLayoutLogic extends BaseLogic{

    public function find($id){
        return OfficeLayout::find($id);
    }

    public function getAll(){
        return OfficeLayout::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function save(OfficeLayout $officeLayout){
        if(isset($officeLayout)){
            $officeLayout->save();
            return $officeLayout;
        }
        return null;
    }
}
