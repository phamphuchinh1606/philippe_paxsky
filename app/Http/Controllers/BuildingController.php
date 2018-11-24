<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('buildings.'.$viewName, $arrayData);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function create(Request $request){
        dd($request);
        return redirect()->route('building.index')->with('success' , 'Create building success');
    }
}
