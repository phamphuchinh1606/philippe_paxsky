<?php

namespace App\Logics;
use App\Models\Customer;
use App\Models\GroupCustomer;
use App\Models\SocialAccount;
use App\Common\Constant;
use Tymon\JWTAuth\Claims\Custom;
use DB;

class CustomerLogic extends BaseLogic{

    public function find($id){
        return Customer::find($id);
    }

    public function findUserId($userId){
        return Customer::where('user_id',$userId)->first();
    }

    public function findSocialAccount($provider, $providerUserId){
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUserId)
            ->first();
        return $account;
    }

    public function getCustomerByEmail($email){
        return Customer::where('email',$email)->first();
    }

    public function getCustomerByMobilePhone($mobilePhone){
        return Customer::where('mobile_phone',$mobilePhone)->first();
    }

    public function getAll($limit = 20){
        return Customer::whereIsDelete(Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->paginate($limit);
    }

    public function save(Customer $customer){
        if(isset($customer)){
            $customer->save();
            return $customer;
        }
        return null;
    }

    public function saveSocial(SocialAccount $socialAccount){
        if(isset($socialAccount)){
            $socialAccount->save();
            return $socialAccount;
        }
        return null;
    }

    public function getGroupCustomerAll(){
        return GroupCustomer::all();
    }

    public function searchCustomer($fullName, $email, $phoneNumber, $limit = 10){
        $query = Customer::whereIsDelete(Constant::$DELETE_FLG_OFF);
        if(isset($fullName) && !empty($fullName)){
            $query->whereRaw("CONCAT(first_name,' ', last_name) like '%$fullName%'");
        }
        if(isset($email) && !empty($email)){
            $query->whereRaw("email like '%$email%'");
        }
        if(isset($phoneNumber) && !empty($phoneNumber)){
            $query->whereRaw("mobile_phone like '%$phoneNumber%'");
        }
        return $query->paginate($limit);
    }
}
