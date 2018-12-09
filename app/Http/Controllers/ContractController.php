<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RentalContract;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Claims\Custom;

class ContractController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('contracts.'.$viewName, $arrayData);
    }

    public function index(){
        $contracts = $this->contractService->getAll();
        return $this->showView('index',['contracts' => $contracts]);
    }

    public function showCreate(){
        $contract = new RentalContract();
        $contract->init();
        $customer = new Customer();
        $customer->init();
        return $this->showView('create',['contract' => $contract, 'customer' => $customer]);
    }

    public function create(Request $request){
        $this->officeService->create($request);
        return redirect()->route('office.index')->with('success','Create office success');
    }
}
