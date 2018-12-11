<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('offices.'.$viewName, $arrayData);
    }

    public function index(){
        $offices = $this->officeService->getAll();
        return $this->showView('index',['offices' => $offices]);
    }

    public function showCreate(){
        $office = new Office();
        $officeLayouts = $this->officeLayoutService->getAll();
        return $this->showView('create',['office' => $office, 'officeLayouts' => $officeLayouts]);
    }

    public function create(Request $request){
        $this->officeService->create($request);
        return redirect()->route('office.index')->with('success','Create office success');
    }

    public function showUpdate($id){
        $office = $this->officeService->find($id);
        if(isset($office)){
            $officeLayouts = $this->officeLayoutService->getAll();
            return $this->showView('update',['office' => $office, 'officeLayouts' => $officeLayouts]);
        }
        return redirect()->route('office_layout.index');
    }

    public function update($id , Request $request){
        $this->officeService->update($id, $request);
        return redirect()->route('office.index')->with('success','Update office success');
    }

    public function destroy($id){
        $this->officeService->destroy($id);
        return redirect()->route('office.index')->with('success','Delete office success');
    }

    //    Ajax
    public function searchOffice(Request $request){
        $offices = $this->officeService->searchOffice($request->building_id, $request->office_name,$request->floor);
        return $this->json($offices);
    }
}
