<?php

namespace App\Logics;
use App\User;
use App\Models\ScheduleAppointment;
use App\Common\Constant;

class AppointmentLogic extends BaseLogic{

    public function find($id){
        return ScheduleAppointment::find($id);
    }

    public function getAll(){
        return ScheduleAppointment::get();
    }

    public function save(ScheduleAppointment $appointment){
        if(isset($appointment)){
            $appointment->save();
            return $appointment;
        }
        return null;
    }
}
