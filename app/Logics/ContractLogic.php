<?php

namespace App\Logics;
use App\User;
use App\Models\RentalContract;
use App\Common\Constant;

class ContractLogic extends BaseLogic{

    public function find($id){
        return RentalContract::find($id);
    }

    public function getAll($limit = 20){
        return RentalContract::orderBy('created_at','desc')->paginate($limit);
    }

    public function save(RentalContract $contract){
        if(isset($contract)){
            $contract->save();
            return $contract;
        }
        return null;
    }

    public function destroy($contractId){
        RentalContract::destroy($contractId);
    }
}
