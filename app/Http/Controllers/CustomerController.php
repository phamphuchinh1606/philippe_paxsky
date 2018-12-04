<?php

namespace App\Http\Controllers;

use App\Common\DateCommon;
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
        $this->customerService->create($request);
        return redirect()->route('customer.index')->with('success','Create customer success');
    }

    public function showUpdate($id){
        $customer = $this->customerService->find($id);
        $customer->birthday_str = DateCommon::dateFormat($customer->birthday, "Y-m-d");
        if(isset($customer)){
            return $this->showView('update',['customer' => $customer]);
        }
        return redirect()->route('customer.index');
    }

    public function update($id , Request $request){
        $this->customerService->update($id, $request);
        return redirect()->route('customer.index')->with('success','Update customer success');
    }

    public function destroy($id){
        $this->customerService->destroy($id);
        return redirect()->route('customer.index')->with('success','Delete customer success');
    }
}
