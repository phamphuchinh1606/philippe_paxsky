<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('news.'.$viewName, $arrayData);
    }

    public function index(){
        $newses = $this->newsService->getAll();
        return $this->showView('index',['newses' => $newses]);
    }

    public function showCreate(){
        $news = new News();
        return $this->showView('$news',['news' => $news]);
    }

    public function create(Request $request){
        $this->appointmentService->create($request);
        return $this->jsonSuccess('Create appointment success');
    }
}
