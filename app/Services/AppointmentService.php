<?php

namespace App\Services;
use App\Common\Constant;
use App\Common\DateCommon;
use App\Logics\AppointmentLogic;
use App\Models\ScheduleAppointment;
use Illuminate\Http\Request;
use App\Common\AppCommon;

class AppointmentService extends BaseService{
    private $appointmentLogic;

    public function __construct(AppointmentLogic $appointmentLogic)
    {
        $this->appointmentLogic = $appointmentLogic;
    }

    public function find($id){
        return $this->appointmentLogic->find($id);
    }

    public function getAll(){
        $appointments = $this->appointmentLogic->getAll();
        foreach ($appointments as $appointment){
            $appointment->status_name = AppCommon::nameAppointmentStatus($appointment->status);
            $appointment->status_class = AppCommon::classAppointmentStatus($appointment->status);
            $appointment->date_str = DateCommon::dateFormat($appointment->date_schedule,'d-m-Y');
            $appointment->time_str = DateCommon::dateFormat($appointment->date_schedule,'H:i');
        }
        return $appointments;
    }

    public function getAllByCustomer($customerId){
        $appointments = $this->appointmentLogic->getAllByCustomer($customerId);
        foreach ($appointments as $appointment){
            $appointment->status_name = AppCommon::nameAppointmentStatus($appointment->status);
            $appointment->date_str = DateCommon::dateFormat($appointment->date_schedule,'d-m-Y H:i');
        }
        return $appointments;
    }

    private function getAppointmentInfo(Request $request, $appointment = null){
        if(!isset($appointment)){
            $appointment = new ScheduleAppointment();
        }
        if(isset($request->customer_id)){
            $appointment->customer_id = $request->customer_id;
        }
        if(isset($request->customer_name)){
            $appointment->full_name = $request->customer_name;
        }
        if(isset($request->email)){
            $appointment->email = $request->email;
        }
        if(isset($request->mobile_phone)){
            $appointment->mobile_phone = $request->mobile_phone;
        }
        if(isset($request->building_id)){
            $appointment->building_id = $request->building_id;
        }
        if(isset($request->office_id)){
            $appointment->office_id = $request->office_id;
        }
        if(isset($request->schedule_date) && isset($request->schedule_time)){
            $appointment->date_schedule = DateCommon::createFromFormat($request->schedule_date.' '.$request->schedule_time,'Y-m-d H:i');
        }
        if(isset($request->sale_person)){
            $appointment->sale_person_id = $request->sale_person;
        }
        if(isset($request->notes)){
            $appointment->note = $request->notes;
        }
        if(isset($request->status)){
            $appointment->status = $request->status;
        }
        return $appointment;
    }

    public function create(Request $request){
        $appointment = $this->getAppointmentInfo($request);
        if($appointment->date_schedule != null){
            $appointmentDB = $this->appointmentLogic->save($appointment);
        }
        return $appointmentDB;
    }

    public function update(Request $request){
        $appointmentDB = $this->appointmentLogic->find($request->appointment_id);
        if(isset($appointmentDB)){
            $appointment = $this->getAppointmentInfo($request,$appointmentDB);
            $appointmentDB = $this->appointmentLogic->save($appointment);
        }
        return $appointmentDB;
    }

    public function ratingVisit(Request $request){
        $appointmentId = $request->appointment_id;
        $ratingNumber = $request->rating_number;
        $ratingComment = $request->rating_comment;
        $appointment = $this->appointmentLogic->find($appointmentId);
        if(isset($appointment)){
            $appointment->rate = $ratingNumber;
            $appointment->rate_comment = $ratingComment;
            $this->appointmentLogic->save($appointment);
        }
    }

    public function destroy($appointmentId){
        $this->appointmentLogic->destroy($appointmentId);
    }

}
