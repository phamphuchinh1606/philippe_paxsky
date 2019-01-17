<?php

namespace App\Http\Controllers\Api;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\DateCommon;
use Illuminate\Http\Request;
use Validator;
use App\Common\ImageCommon;
use JWTAuthException;
use JWTAuth;

class CustomerController extends ControllerApi
{
    private function customerToJson($customer){
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
        return $customerInfo;
    }

    public function create(Request $request){
//        $messages = array(
//            'required' => 'Vui lòng nhập thông tin (*).',
//            'numeric' => 'Điện thoại phải dạng số',
//            'email' => 'Địa chỉ email không đúng',
//            'confirmed'=>'Nhập lại mật khẩu không chính xác'
//        );
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email',
            'password' => 'required|min:6',
            'mobile_phone'=>'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        //Check email exit
        if($this->customerService->checkEmailExit($request->email)){
            return response()->json([
                'status'=> false,
                'message'=> 'Email address already exists'
            ]);
        }
        $request->group_id = Constant::$GROUP_CUSTOMER_VISIT;
        $request->is_active = 'on';
        $customer = $this->customerService->create($request);
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

        $customerInfo = $this->customerToJson($customer);

        return response()->json([
            'status'=> 0,
            'token'=> $token,
            'message'=>'Create success! ',
            'customer_id' =>  $customer->id,
            'customer' => $customerInfo
        ]);
    }

    public function update(Request $request){
        $rules = array(
            'customer_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $customer = $this->customerService->find($request->customer_id);
        if(!isset($customer)){
            return response()->json([
                'status'=> false,
                'message'=> 'Customer not exit'
            ]);
        }
        $this->customerService->update($request->customer_id,$request);
        return $this->jsonSuccess();
    }

    public function info(Request $request){
        $rules = array(
            'customer_id' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $customer = $this->customerService->find($request->customer_id);
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
        return $this->json($customerInfo);
    }

    public function callBackLoginFacebook(Request $request){
        $request->provider = Constant::$PROVIDER_SOCIAL_FACEBOOK;
        $rules = array(
            'provider_user_id' => 'required',
            'access_token' => 'required',
            'email' => 'required',
            'nick_name' => 'required',
            'name' => 'required',
        );
        return $this->callbackLogicSocial($request, $rules);
    }

    public function callBackLoginMobilePhone(Request $request){
        $request->provider = Constant::$PROVIDER_SOCIAL_MOBILE_PHONE;
        $rules = array(
            'provider_user_id' => 'required',
            'access_token' => 'required',
            'mobile_phone' => 'required',
            'email' => 'required',
            'nick_name' => 'required',
            'name' => 'required',
        );
        return $this->callbackLogicSocial($request, $rules);
    }

    public function callbackLogicSocial(Request $request, $rules = null){
        if(!isset($rules)){
            $rules = array(
                'provider' => 'required',
                'provider_user_id' => 'required',
                'access_token' => 'required',
                'nick_name' => 'required',
                'name' => 'required',
                'email' => 'required',
                'mobile_phone' => 'required',
                'profile_image' => 'required'
            );
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $customer = $this->customerService->createUserFromSocial($request);
        $token = null;
        try {
            if (!$token = JWTAuth::fromUser($customer->user)) {
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

        $customerInfo = $this->customerToJson($customer);
        return response()->json([
            'status'=> 0,
            'first_login' => $customer->first_login,
            'token'=> $token,
            'message'=>'Create success! ',
            'customer_id' =>  $customer->id,
            'customer' => $customerInfo
        ]);
    }
}
