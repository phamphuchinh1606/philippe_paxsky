<?php

namespace App\Logics;
use App\User;
use App\Models\News;
use App\Common\Constant;

class NewsLogic extends BaseLogic{

    public function find($id){
        return News::find($id);
    }

    public function getAll($limit = 20){
        return News::where('is_delete', Constant::$DELETE_FLG_OFF)->orderBy('created_at','desc')->paginate($limit);
    }

    public function save(News $news){
        if(isset($news)){
            $news->save();
            return $news;
        }
        return null;
    }

    public function destroy($newsId){
        News::destroy($newsId);
    }
}
