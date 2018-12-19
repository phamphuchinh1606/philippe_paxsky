<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use JWTAuthException;
use JWTAuth;
use Validator;
use App\Common\{AppCommon,ImageCommon,DateCommon};

class LoginController extends ControllerApi
{
    public function login(Request $request){
        $rules = array(
            'email' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $isLogin = $this->userService->checkLogin($request->email, $request->password);
        if(isset($isLogin)){
            $credentials = $request->only('email', 'password');
            $token = null;
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'status'=> false,
                        'message'=> 'invalid email or password'
                    ]);
                }
            } catch (JWTAuthException $e) {
                return response()->json([
                    'status'=> false,
                    'message'=> 'failed to create token'
                ]);
            }
            $customerId = $isLogin->id;
            if(isset($isLogin->customer) && count($isLogin->customers) > 0){
                $customerId = $isLogin->customers[0]->id;
            }
            $customer = $this->customerService->find($customerId);
            if(!isset($customer)){
                return $this->jsonError([],'Customer not exit.');
            }
            $customerInfo = new \StdClass();
            $customerInfo->customer_id  = $customer->id;
            $customerInfo->first_name = $customer->first_name;
            $customerInfo->last_name = $customer->last_name;
            $customerInfo->email = $customer->email;
            $customerInfo->mobile_phone = $customer->mobile_phone;
            $customerInfo->address = AppCommon::nullToEmpty($customer->address);
            $customerInfo->province_id = AppCommon::nullToEmpty($customer->province_id);
            $customerInfo->province_name =  isset($customer->province) ? $customer->province->label : '';;
            $customerInfo->district_id = AppCommon::nullToEmpty($customer->district_id);
            $customerInfo->district_name =  isset($customer->district) ? $customer->district->label : '';;
            $customerInfo->gender = AppCommon::nullToEmpty($customer->gender);
            $customerInfo->birthday = DateCommon::dateFormat($customer->birthday,'d-m-Y');
            $customerInfo->image_profile = (isset($customer->user) && isset($customer->user->profile_image)) ? ImageCommon::showImage($customer->user->profile_image) : asset('images/no_image_available.jpg');
            return response()->json([
                'status'=> 0,
                'token'=> $token,
                'message'=>'Login success! ',
                'customer_id' => $customerId,
                'customer' => $customerInfo
            ]);
        }
        return response()->json([
            'status'=> false,
            'message'=> 'invalid email or password'
        ]);
    }
}
