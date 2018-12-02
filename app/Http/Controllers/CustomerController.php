<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('customers.'.$viewName, $arrayData);
    }

    public function index(){
        $customers = $this->customerService->getAll();
        return $this->showView('index',['customers' => $customers]);
    }

    public function showCreate(){
        $customer = new Customer();
        $customer->init();
        return $this->showView('create',['customer' => $customer]);
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
