<?php

namespace App\Http\Controllers\Api;

use App\Common\AppCommon;
use App\Common\Constant;
use App\Common\DateCommon;
use Illuminate\Http\Request;
use Validator;
use App\Common\ImageCommon;

class CustomerController extends ControllerApi
{
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
        $request->group_id = Constant::$GROUP_CUSTOMER_VISIT;
        $request->is_active = 'on';
        $this->customerService->create($request);
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
}
