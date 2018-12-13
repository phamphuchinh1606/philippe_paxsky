<?php

namespace App\Services;
use App\Common\Constant;
use App\Common\DateCommon;
use App\Logics\NewsLogic;
use App\Models\News;
use Illuminate\Http\Request;
use App\Common\AppCommon;

class NewsService extends BaseService{
    private $newsLogic;

    public function __construct(NewsLogic $newsLogic)
    {
        $this->newsLogic = $newsLogic;
    }

    public function find($id){
        return $this->newsLogic->find($id);
    }

    public function getAll(){
        $newses = $this->newsLogic->getAll();
        foreach ($newses as $news){
            $news->status_name = AppCommon::namePublic($news->status_id);
            $news->status_class = AppCommon::classPublic($news->status_id);
            $news->public_date_str = DateCommon::dateFormat($news->public_date,'d-m-Y');
        }
        return $newses;
    }


    private function getNewsInfo(Request $request, $news = null){
        if(!isset($news)){
            $news = new News();
        }
        $news->title = $request->title;
        $news->url = $request->url_news;
        $news->image = $request->image_url;
        $news->status_id = AppCommon::getIsPublic($request->status);
        $news->public_date = DateCommon::createFromFormat($request->public_date,'Y-m-d');
        $news->content = $request->notes;
        return $news;
    }

    public function create(Request $request){
        $news = $this->getNewsInfo($request);
        if(isset($news->title)){
            $news = $this->newsLogic->save($news);
        }
        return $news;
    }

    public function update(Request $request){
        $news = $this->newsLogic->find($request->news_id);
        if(isset($news)){
            $news = $this->getNewsInfo($request,$news);
            $news = $this->newsLogic->save($news);
        }
        return $news;
    }

    public function destroy($newsId){
        $news = $this->newsLogic->find($newsId);
        if(isset($news)){
            $news->is_delete = Constant::$DELETE_FLG_ON;
            $this->newsLogic->save($news);
        }
    }

}
