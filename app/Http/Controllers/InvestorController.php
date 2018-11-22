<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('investors.'.$viewName, $arrayData);
    }

    public function index(){
        $investors = $this->investorService->getAll();
        return $this->showView('index',['investors' => $investors]);
    }

    public function showCreate(){
        return $this->showView('create');
    }

    public function create(Request $request){
        $this->investorService->create($request->investor_name);
        return redirect()->route('investor.index')->with('success','Create investor success');
    }

    public function showUpdate($id){
        $investor = $this->investorService->find($id);
        if(isset($investor)){
            return $this->showView('update',['investor' => $investor]);
        }
        return redirect()->route('investor.index');
    }

    public function update($id , Request $request){
        $this->investorService->update($id, $request->investor_name);
        return redirect()->route('investor.index')->with('success','Update investor success');
    }

    public function destroy($id){
        $this->investorService->destroy($id);
        return redirect()->route('investor.index')->with('success','Delete investor success');
    }
}
