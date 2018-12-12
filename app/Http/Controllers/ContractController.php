<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RentalContract;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Claims\Custom;
use App\Common\DateCommon;

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
        $this->contractService->create($request);
        return redirect()->route('contract.index')->with('success','Create contract success');
    }

    public function showUpdate($id){
        $contract = $this->contractService->find($id);
        $contract->contract_date = DateCommon::dateFormat($contract->contract_date,'Y-m-d');
        $contract->start_date = DateCommon::dateFormat($contract->start_date,'Y-m-d');
        $contract->end_date = DateCommon::dateFormat($contract->end_date,'Y-m-d');
//        dd($contract->offices);
        $customer = new Customer();
        $customer->init();
        return $this->showView('update',['contract' => $contract, 'customer' => $customer]);
    }

    public function update(Request $request){
        $this->contractService->update($request);
        return redirect()->route('contract.index')->with('success','Update contract success');
    }
}
