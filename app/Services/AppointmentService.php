<?php

namespace App\Services;
use App\Common\Constant;
use App\Common\DateCommon;
use App\Logics\AppointmentLogic;
use App\Models\ScheduleAppointment;
use App\Services\Socials\FireBaseService;
use Illuminate\Http\Request;
use App\Common\AppCommon;

class AppointmentService extends BaseService{
    private $appointmentLogic;
    private $fireBaseService;

    public function __construct(AppointmentLogic $appointmentLogic, FireBaseService $fireBaseService)
    {
        $this->appointmentLogic = $appointmentLogic;
        $this->fireBaseService = $fireBaseService;
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
            if(isset($appointment->customer)){
                $appointment->full_name = $appointment->customer->fullName;
            }
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
            $statusOld = $appointmentDB->status;
            $appointment = $this->getAppointmentInfo($request,$appointmentDB);
            $statusNew = $appointment->status;
            $appointmentDB = $this->appointmentLogic->save($appointment);
            if($statusOld != $statusNew && ( $statusNew == Constant::$APPOINTMENT_STATUS_SCHEDULE || $statusNew == Constant::$APPOINTMENT_STATUS_CANCEL )){
                if($statusNew == Constant::$APPOINTMENT_STATUS_SCHEDULE){
                    $statusName = "confirmed";
                }else{
                    $statusName = "canceled";
                }
                //Send Notification
                $buildingName = $appointmentDB->building->name;
                $this->pushNotification($appointmentDB->customer_id, $buildingName, $statusName);
            }
        }
        return $appointmentDB;
    }

    private function pushNotification($customerId, $buildingName, $statusName){
        $title = "Confirm Appointment";
        $body = "Your appointment schedule at the building $buildingName has been $statusName.";
        $this->fireBaseService->pushNotification($customerId, $title, $body);
    }

    public function ratingVisit(Request $request){
        $appointmentId = $request->appointment_id;
        $ratingNumber = $request->rate_number;
        $ratingComment = $request->rate_comment;
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
