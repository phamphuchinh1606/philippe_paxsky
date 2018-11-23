<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('classifys.'.$viewName, $arrayData);
    }

    public function index(){
        $classifys = $this->classificationService->getAll();
        return $this->showView('index',['classifys' => $classifys]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function create(Request $request){
        $this->classificationService->create($request->classify_name);
        return redirect()->route('classify.index')->with('success','Create classification success');
    }

    public function showUpdate($id){
        $classify = $this->classificationService->find($id);
        if(isset($classify)){
            return $this->showView('update',['classify' => $classify]);
        }
        return redirect()->route('classify.index');
    }

    public function update($id , Request $request){
        $this->classificationService->update($id, $request->classify_name);
        return redirect()->route('classify.index')->with('success','Update classification success');
    }

    public function destroy($id){
        $this->classificationService->destroy($id);
        return redirect()->route('classify.index')->with('success','Delete classification success');
    }
}
