<?php

namespace App\Logics;
use App\Models\Customer;
use App\Models\GroupCustomer;
use App\Common\Constant;

class CustomerLogic extends BaseLogic{

    public function find($id){
        return Customer::find($id);
    }

    public function getAll($limit = 20){
        return Customer::whereIsDelete(Constant::$DELETE_FLG_OFF)->limit($limit)->get();
    }

    public function save(Customer $customer){
        if(isset($customer)){
            $customer->save();
            return $customer;
        }
        return null;
    }

    public function getGroupCustomerAll(){
        return GroupCustomer::all();
    }
}
