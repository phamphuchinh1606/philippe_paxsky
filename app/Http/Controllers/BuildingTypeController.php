<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingTypeController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('buildingTypes.'.$viewName, $arrayData);
    }

    public function index(){
        $buildingTypes = $this->buildingTypeService->getAll();
        return $this->showView('index',['buildingTypes' => $buildingTypes]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function create(Request $request){
        $this->buildingTypeService->create($request->type_name);
        return redirect()->route('building_type.index')->with('success','Create building type success');
    }

    public function showUpdate($id){
        $buildingType = $this->buildingTypeService->find($id);
        if(isset($buildingType)){
            return $this->showView('update',['buildingType' => $buildingType]);
        }
        return redirect()->route('building_type.index');
    }

    public function update($id , Request $request){
        $this->buildingTypeService->update($id, $request->type_name);
        return redirect()->route('building_type.index')->with('success','Update building type success');
    }

    public function destroy($id){
        $this->buildingTypeService->destroy($id);
        return redirect()->route('building_type.index')->with('success','Delete building type success');
    }
}
