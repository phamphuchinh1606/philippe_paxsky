<?php

namespace App\Logics;
use App\Common\UserTypeConstant;
use App\User;
use App\Models\UserType;
use App\Common\Constant;

class UserLogic extends BaseLogic{

    public function find($id){
        return User::find($id);
    }

    public function getAll(){
        return User::whereIsDelete(Constant::$DELETE_FLG_OFF)->where('user_type_id','<>',UserTypeConstant::$USER_TYPE_CUSTOMER)->get();
    }

    public function getUserByType($userTypeId){
        return User::whereIsDelete(Constant::$DELETE_FLG_OFF)->where('user_type_id',$userTypeId)->get();
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

    public function checkLogin($email){
        return User::whereIsDelete(Constant::$DELETE_FLG_OFF)->whereIsActive(Constant::$ACTIVE_FLG_ON)
                ->whereEmail($email)
                ->whereUserTypeId(UserTypeConstant::$USER_TYPE_CUSTOMER)->first();
    }
}
