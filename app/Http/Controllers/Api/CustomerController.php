<?php

namespace App\Http\Controllers\Api;

use App\Common\Constant;
use Illuminate\Http\Request;
use Validator;

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
            'mobile_phone'=>'required|numeric',
            'gender' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'address'=>'required',
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
}
