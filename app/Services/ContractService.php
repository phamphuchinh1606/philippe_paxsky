<?php

namespace App\Services;
use App\Common\Constant;
use App\Common\DateCommon;
use App\Logics\ContractLogic;
use Illuminate\Http\Request;
use App\Common\AppCommon;

class ContractService extends BaseService{
    private $contractLogic;

    public function __construct(ContractLogic $contractLogic)
    {
        $this->contractLogic = $contractLogic;
    }

    public function find($id){
        return $this->contractLogic->find($id);
    }

    public function getAll(){
        $contracts = $this->contractLogic->getAll();
//        foreach ($appointments as $appointment){
//            $appointment->status_name = AppCommon::nameAppointmentStatus($appointment->status);
//            $appointment->status_class = AppCommon::classAppointmentStatus($appointment->status);
//            $appointment->date_str = DateCommon::dateFormat($appointment->date_schedule,'d-m-Y');
//            $appointment->time_str = DateCommon::dateFormat($appointment->date_schedule,'H:i');
//        }
        return $contracts;
    }

}
