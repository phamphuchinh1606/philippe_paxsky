<?php

namespace App\Logics;
use App\Models\Direction;
use App\Common\Constant;

class DirectionLogic extends BaseLogic{

    public function find($id){
        return Direction::find($id);
    }

    public function getAll(){
        return Direction::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function create($directionName){
        return Direction::create([
            'name' => $directionName
        ]);
    }

    public function save(Direction $direction){
        if(isset($direction)){
            return $direction->save();
        }
        return null;
    }
}
