<?php

namespace App\Http\Controllers;

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
        $this->userService->create($request);
        return redirect()->route('user.index')->with('success','Create user success');
    }

    public function showUpdate($id){
        $user = $this->userService->find($id);
        if(isset($user)){
            return $this->showView('update',['user' => $user]);
        }
        return redirect()->route('user.index');
    }

    public function update($id , Request $request){
        $this->userService->update($id, $request);
        return redirect()->route('user.index')->with('success','Update user success');
    }

    public function destroy($id){
        $this->userService->destroy($id);
        return redirect()->route('user.index')->with('success','Delete user success');
    }
}
