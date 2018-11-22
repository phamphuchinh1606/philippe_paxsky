<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('buildingTypes.'.$viewName, $arrayData);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showView('index');
    }
}
