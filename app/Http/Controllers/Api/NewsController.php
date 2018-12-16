<?php

namespace App\Http\Controllers\Api;

use App\Common\DateCommon;
use Illuminate\Http\Request;

class NewsController extends ControllerApi
{
    public function newsList(Request $request){
        $newses = $this->newsService->search($request->special);
        $listResult = [];
        foreach ($newses as $news){
            $newsItem = new \StdClass();
            $newsItem->news_id = $news->id;
            $newsItem->title = $news->title;
            $newsItem->url = $news->url;
            $newsItem->image = $news->image;
            $newsItem->special = $news->news_special;
            $newsItem->public_date = DateCommon::dateFormat($news->public_date,'d-m-Y');
            $newsItem->content = $news->content;
            $listResult[] = $newsItem;
        }
        return $this->json($listResult);
    }
}
