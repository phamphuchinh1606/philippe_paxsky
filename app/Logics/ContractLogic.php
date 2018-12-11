<?php

namespace App\Logics;
use App\Models\RentalContractCustomer;
use App\Models\RentalContractDetail;
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

    public function saveContractCustomer(RentalContractCustomer $contractCustomer){
        if(isset($contractCustomer)){
            $contractCustomer->save();
            return $contractCustomer;
        }
        return null;
    }

    public function saveContractDetail(RentalContractDetail $contractDetail){
        if(isset($contractDetail)){
            $contractDetail->save();
            return $contractDetail;
        }
        return null;
    }

    public function destroy($contractId){
        RentalContract::destroy($contractId);
    }

    //Contract Customer
    public function getContractCustomerByContractId($contractId){
        return RentalContractCustomer::where('contract_id',$contractId)->get();
    }

    //Contract Detail
    public function getContractDetailByContractId($contractId){
        return RentalContractDetail::where('contract_id',$contractId)->get();
    }
}
