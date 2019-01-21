<?php

namespace App\Logics;
use App\Models\FireBaseToken;
use App\Common\Constant;

class FireBaseTokenLogic extends BaseLogic{

    public function find($id){
        return FireBaseToken::find($id);
    }

    public function findByUserDevice($userId, $device){
        return FireBaseToken::whereUserId($userId)->whereDevice($device)->first();
    }

    public function findByCustomerDevice($customerId, $device){
        return FireBaseToken::whereCustomerId($customerId)->whereDevice($device)->first();
    }

    public function getAll(){
        return FireBaseToken::all();
    }

    public function getTokenByCustomerId($customerId){
        return FireBaseToken::whereCustomerId($customerId)->get();
    }

    public function save(FireBaseToken $item){
        if(isset($item)){
            return $item->save();
        }
        return null;
    }
}
