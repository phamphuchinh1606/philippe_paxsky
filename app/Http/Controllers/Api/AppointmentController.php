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
            'office_id' => 'required',
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

    public function update(Request $request){
        $rules = array(
            'appointment_id' => 'required',
            'customer_name' => 'required',
            'email' => 'required',
            'mobile_phone' => 'required',
            'office_id' => 'required',
            'schedule_date'=>'required|date_format:Y-m-d',
            'schedule_time' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $request->status = Constant::$APPOINTMENT_STATUS_PENDING;
        $this->appointmentService->update($request);
        return $this->jsonSuccess();
    }

    public function delete(Request $request){
        $rules = array(
            'appointment_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $this->appointmentService->destroy($request->appointment_id);
        return $this->jsonSuccess();
    }

    private function appointmentToJson($appointment){
        $appointmentItem = new \StdClass();
        $appointmentItem->appointment_id = $appointment->id;
        $appointmentItem->customer_id = $appointment->customer_id;
        $appointmentItem->building_id = $appointment->building_id;
        if(isset($appointment->building)){
            $appointmentItem->building_name = $appointment->building->name;
        }else{
            $appointmentItem->building_name = '';
        }
        $appointmentItem->office_id = $appointment->office_id;
        if(isset($appointment->office)){
            $appointmentItem->office_name = $appointment->office->office_name;
        }else{
            $appointmentItem->office_name = '';
        }
        $appointmentItem->sale_person_id = $appointment->sale_person_id;
        if(isset($appointment->user)){
            $appointmentItem->sale_person_name = $appointment->user->full_name;
        }
        $appointmentItem->full_name = $appointment->full_name;
        $appointmentItem->date_schedule = $appointment->date_str;
        $appointmentItem->notes = $appointment->note;
        $appointmentItem->status_name = $appointment->status_name;
        $appointmentItem->status_code = $appointment->status;
        $appointmentItem->rate_number = $appointment->rate;
        $appointmentItem->rate_comment = $appointment->rate_comment;
        return $appointmentItem;
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
            $appointmentItem = $this->appointmentToJson($appointment);
            $listResult[] = $appointmentItem;
        }
        return $this->json($listResult);
    }

    public function appointmentLastDoneNotRating(Request $request){
        $rules = array(
            'customer_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $appointment = $this->appointmentService->getAppointLastDoneNotRating($request->customer_id);
        $result = new \StdClass();
        if(isset($appointment)){
            $appointmentItem = $this->appointmentToJson($appointment);
            $result->count = 1;
            $result->appointment = $appointmentItem;
            return $this->json($result);
        }
        $result->count = 0;
        return $this->json($result);
    }

    public function updateFlgSkip(Request $request){
        $rules = array(
            'appointment_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $this->appointmentService->updateFlgSkip($request->appointment_id);
        return $this->jsonSuccess('Update flg skip appointment success');
    }

    public function ratingVisit(Request $request){
        $rules = array(
            'appointment_id' => 'required',
            'rate_number' => 'required'
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
