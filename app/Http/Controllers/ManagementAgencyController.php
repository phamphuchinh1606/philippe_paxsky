<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementAgencyController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('managementAgencies.'.$viewName, $arrayData);
    }

    public function index(){
        $managementAgencies = $this->managementAgencyService->getAll();
        return $this->showView('index',['managementAgencies' => $managementAgencies]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function create(Request $request){
        $this->managementAgencyService->create($request->management_agency_name);
        return redirect()->route('management_agency.index')->with('success','Create management agency success');
    }

    public function showUpdate($id){
        $managementAgency = $this->managementAgencyService->find($id);
        if(isset($managementAgency)){
            return $this->showView('update',['managementAgency' => $managementAgency]);
        }
        return redirect()->route('management_agency.index');
    }

    public function update($id , Request $request){
        $this->managementAgencyService->update($id, $request->management_agency_name);
        return redirect()->route('management_agency.index')->with('success','Update management agency success');
    }

    public function destroy($id){
        $this->managementAgencyService->destroy($id);
        return redirect()->route('management_agency.index')->with('success','Delete management agency success');
    }
}
