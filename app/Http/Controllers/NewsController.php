<?php

namespace App\Http\Controllers;

use App\Common\DateCommon;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private function showView($viewName,$arrayData = []){
        return View('newses.'.$viewName, $arrayData);
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
        $this->newsService->create($request);
        return $this->jsonSuccess('Create news success');
    }

    public function showUpdate(Request $request){
        if(isset($request->news_id)){
            $news = $this->newsService->find($request->news_id);
            if(isset($news)){
                $news->public_date = DateCommon::dateFormat($news->public_date,'Y-m-d');
                return $this->json($news);
            }
        }
        return $this->json(array('status' => 1, 'error' => 'error'));
    }

    public function update(Request $request){
        $this->newsService->update($request);
        return $this->jsonSuccess('Update news success');
    }

    public function destroy(Request $request){
        $this->newsService->destroy($request->news_id);
        return $this->jsonSuccess('Delete news success');
    }
}
