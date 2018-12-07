<?php

namespace App\Logics;
use App\User;
use App\Models\ScheduleAppointment;
use App\Common\Constant;

class AppointmentLogic extends BaseLogic{

    public function find($id){
        return ScheduleAppointment::find($id);
    }

    public function getAll($limit = 10){
        return ScheduleAppointment::orderBy('created_at','desc')->paginate($limit);
    }

    public function getAllByCustomer($customerId, $limit=50){
        return ScheduleAppointment::where('customer_id',$customerId)->orderBy('created_at','desc')->limit($limit)->get();
    }

    public function save(ScheduleAppointment $appointment){
        if(isset($appointment)){
            $appointment->save();
            return $appointment;
        }
        return null;
    }

    public function destroy($appointmentId){
        ScheduleAppointment::destroy($appointmentId);
    }
}
