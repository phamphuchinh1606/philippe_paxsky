<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('users.'.$viewName, $arrayData);
    }

    public function index(){
        $users = $this->userService->getAll();
        return $this->showView('index',['users' => $users]);
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
