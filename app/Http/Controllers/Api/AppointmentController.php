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

    public function appointmentList(Request $request){
        $rules = array(
            'customer_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $appointments = $this->appointmentService->getAllByCustomer($request->customer_id);
        $listResult = [];
        foreach ($appointments as $appointment){
            $appointmentItem = new \StdClass();
            $appointmentItem->appointment_id = $appointment->id;
            $appointmentItem->customer_id = $appointment->customer_id;
            $appointmentItem->building_name = $appointment->building->name;
            $appointmentItem->full_name = $appointment->full_name;
            $appointmentItem->date_schedule = $appointment->date_str;
            $appointmentItem->notes = $appointment->note;
            $appointmentItem->status_name = $appointment->status_name;
            $appointmentItem->status_code = $appointment->status;
            $appointmentItem->rate_number = $appointment->rate;
            $appointmentItem->rate_comment = $appointment->rate_comment;
            $listResult[] = $appointmentItem;
        }
        return $this->json($listResult);
    }

    public function ratingVisit(Request $request){
        $rules = array(
            'appointment_id' => 'required',
            'rating_number' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $this->appointmentService->ratingVisit($request);
        return $this->jsonSuccess();
    }
}
