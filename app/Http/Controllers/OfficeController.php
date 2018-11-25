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
        $this->officeLayoutService->create($request);
        return redirect()->route('office_layout.index')->with('success','Create office layout success');
    }

    public function showUpdate($id){
        $officeLayout = $this->officeLayoutService->find($id);
        if(isset($officeLayout)){
            return $this->showView('update',['officeLayout' => $officeLayout]);
        }
        return redirect()->route('office_layout.index');
    }

    public function update($id , Request $request){
        $this->officeLayoutService->update($id, $request);
        return redirect()->route('office_layout.index')->with('success','Update office layout success');
    }

    public function destroy($id){
        $this->officeLayoutService->destroy($id);
        return redirect()->route('office_layout.index')->with('success','Delete office layout success');
    }
}
