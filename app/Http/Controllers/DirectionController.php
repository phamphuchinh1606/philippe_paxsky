<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectionController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('directions.'.$viewName, $arrayData);
    }

    public function index(){
        $investors = $this->directionService->getAll();
        return $this->showView('index',['investors' => $investors]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function create(Request $request){
        $this->directionService->create($request->direction_name);
        return redirect()->route('investor.index')->with('success','Create direction success');
    }

    public function showUpdate($id){
        $direction = $this->directionService->find($id);
        if(isset($direction)){
            return $this->showView('update',['direction' => $direction]);
        }
        return redirect()->route('direction.index');
    }

    public function update($id , Request $request){
        $this->directionService->update($id, $request->investor_name);
        return redirect()->route('direction.index')->with('success','Update direction success');
    }

    public function destroy($id){
        $this->directionService->destroy($id);
        return redirect()->route('direction.index')->with('success','Delete direction success');
    }
}
