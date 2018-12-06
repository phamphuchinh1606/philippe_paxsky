<?php

namespace App\Http\Controllers\Api;

use App\Common\Constant;
use Illuminate\Http\Request;
use Validator;

class AppointmentController extends ControllerApi
{
    public function create(Request $request){
        $rules = array(
            'customer_name' => 'required',
            'email' => 'required',
            'mobile_phone' => 'required',
            'building_id' => 'required',
            'schedule_date'=>'required|date_format:Y-m-d',
            'schedule_time' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $request->status = Constant::$APPOINTMENT_STATUS_PENDING;
        $this->appointmentService->create($request);
        return $this->jsonSuccess();
    }
}
