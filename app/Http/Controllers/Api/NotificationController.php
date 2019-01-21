<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class NotificationController extends ControllerApi
{
    public function createRequestToken(Request $request){
        $rules = array(
            'customer_id' => 'required',
            'fire_base_device' => 'required',
            'fire_base_token' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $result = $this->fireBaseService->createRequestToken($request->customer_id, $request->fire_base_device, $request->fire_base_token);
        if($result){
            return $this->jsonSuccess('Create fireBase token success');
        }
        return $this->jsonError(['customer_id' => 'Customer do not exists'], 'Customer do not exists');
    }
}
