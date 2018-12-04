<?php

namespace App\Logics;
use App\User;
use App\Models\UserType;
use App\Common\Constant;

class UserLogic extends BaseLogic{

    public function find($id){
        return User::find($id);
    }

    public function getAll(){
        return User::whereIsDelete(Constant::$DELETE_FLG_OFF)->where('user_type_id','<>',Constant::$USER_TYPE_CUSTOMER)->get();
    }

    public function save(User $user){
        if(isset($user)){
            $user->save();
            return $user;
        }
        return null;
    }

    public function getUserTypeAll(){
        return UserType::all();
    }
}
