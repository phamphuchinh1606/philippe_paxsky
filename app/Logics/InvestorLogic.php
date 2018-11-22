<?php

namespace App\Logics;
use App\Models\Investor;
use App\Common\Constant;

class InvestorLogic extends BaseLogic{

    public function find($id){
        return Investor::find($id);
    }

    public function getAll(){
        return Investor::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function create($investorName){
        return Investor::create([
            'name' => $investorName
        ]);
    }

    public function save(Investor $investor){
        if(isset($investor)){
            return $investor->save();
        }
        return null;
    }
}
