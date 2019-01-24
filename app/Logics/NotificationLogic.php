<?php

namespace App\Logics;
use App\Models\Notification;
use App\Common\Constant;
use DB;

class NotificationLogic extends BaseLogic{

    public function find($id){
        return Notification::find($id);
    }

    public function getAll(){
        return Notification::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function getByCustomer($customerId){
        return Notification::whereIsDelete(Constant::$DELETE_FLG_OFF)->whereToCustomerId($customerId)->orderBy('created_at','desc')->get();
    }

    public function save(Notification $item){
        if(isset($item)){
            return $item->save();
        }
        return null;
    }
}
