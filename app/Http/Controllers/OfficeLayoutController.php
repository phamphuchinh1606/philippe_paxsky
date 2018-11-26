<?php

namespace App\Http\Controllers;

use App\Models\OfficeLayout;
use Illuminate\Http\Request;

class OfficeLayoutController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('officeLayouts.'.$viewName, $arrayData);
    }

    public function index(){
        $offices = $this->officeLayoutService->getAll();
        return $this->showView('index',['offices' => $offices]);
    }

    public function showCreate(){
        $officeLayout = new OfficeLayout();
        return $this->showView('create',['officeLayout' => $officeLayout]);
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

    public function officeLayoutToJson(Request $request){
        $id = $request->office_layout_id;
        if(isset($id)){
            $officeLayout = $this->officeLayoutService->find($id);
            if(isset($officeLayout)){
                return response()->json($officeLayout);
            }
        }
        $jsonData = new \StdClass();
        $jsonData->error = "Can not get data";
        $jsonData->error_code = -1;
        return response()->json($jsonData);
    }
}
