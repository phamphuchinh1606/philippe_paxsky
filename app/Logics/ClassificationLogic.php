<?php

namespace App\Logics;
use App\Models\Classify;
use App\Common\Constant;

class ClassificationLogic extends BaseLogic{

    public function find($id){
        return Classify::find($id);
    }

    public function getAll(){
        return Classify::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function create($classifyName){
        return Classify::create([
            'name' => $classifyName
        ]);
    }

    public function save(Classify $classify){
        if(isset($classify)){
            return $classify->save();
        }
        return null;
    }
}
