<?php

namespace App\Http\Controllers;

use App\Common\DateCommon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('appointments.'.$viewName, $arrayData);
    }

    public function index(){
        $appointments = $this->appointmentService->getAll();
        return $this->showView('index',['appointments' => $appointments]);
    }

    public function showCreate(){
        $user = new User();
        return $this->showView('create',['user' => $user]);
    }

    public function create(Request $request){
        $this->appointmentService->create($request);
        return $this->jsonSuccess('Create appointment success');
    }

    public function showUpdate(Request $request){
        if(isset($request->appointment_id)){
            $appointment = $this->appointmentService->find($request->appointment_id);
            if(isset($appointment)){
                $appointment->date_visit = DateCommon::dateFormat($appointment->date_schedule,'Y-m-d');
                $appointment->time_visit =  DateCommon::dateFormat($appointment->date_schedule,'H:i');
                return $this->json($appointment);
            }
        }
        return $this->json(array('status' => 1, 'error' => 'error'));
    }

    public function update(Request $request){
        $this->appointmentService->update($request);
        return $this->jsonSuccess('Update appointment success');
    }

    public function destroy(Request $request){
        $this->appointmentService->destroy($request->appointment_id);
        return $this->jsonSuccess('Delete appointment success');
    }
}
