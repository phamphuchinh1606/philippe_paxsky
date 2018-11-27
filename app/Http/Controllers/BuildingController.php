<?php

namespace App\Http\Controllers;

use App\Common\Constant;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('buildings.'.$viewName, $arrayData);
    }

    public function index(){
        $buildings = $this->buildingService->getAll();
        return $this->showView('index',['buildings' => $buildings]);
    }

    public function showCreate(){
        $building = new Building();
        $building->init();
        $building->is_public = Constant::$PUBLIC_FLG_ON;
        return $this->showView('create',['building' => $building]);
    }

    public function create(Request $request){
        $building = $this->buildingService->create($request);
        return redirect()->route('building.index')->with('success' , 'Create building success');
    }

    public function showUpdate($id){
        $building = $this->buildingService->find($id);
        return $this->showView('update',['building' => $building]);
    }

    public function update($id, Request $request){
        $building = $this->buildingService->update($id, $request);
        return redirect()->route('building.index')->with('success' , 'Update building success');
    }

    public function addBuildingImage($buildingId, Request $request){
        $image = $request->file('image_add') ;
        if(isset($image)){
            $this->buildingImageService->addImage($buildingId,$image);
        }
        return redirect()->route('building.update',['id' => $buildingId]);
    }

    public function deleteBuildingImage($buildingId, $id){
        $this->buildingImageService->deleteImage($id);
        return redirect()->route('building.update',['id' => $buildingId]);
    }

    public function destroy($id){
        $this->buildingService->destroy($id);
        return redirect()->route('building.index')->with('success' , 'Delete building success');
    }
}
