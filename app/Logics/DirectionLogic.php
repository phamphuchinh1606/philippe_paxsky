<?php

namespace App\Logics;
use App\Models\Direction;
use App\Models\Building;
use App\Common\Constant;
use DB;

class DirectionLogic extends BaseLogic{

    public function find($id){
        return Direction::find($id);
    }

    public function getAll(){
        return Direction::whereIsDelete(Constant::$DELETE_FLG_OFF)->get();
    }

    public function getDirectionAndCountBuilding(){
        $subquery = Building::whereIsDelete(Constant::$DELETE_FLG_OFF)
            ->select(DB::raw("direction_id,count(id) as count_building"))
            ->groupBy('direction_id');
        $tableDirection = (new Direction())->getTable();
        $list = Direction::whereIsDelete(Constant::$DELETE_FLG_OFF)->leftJoinSub($subquery,'subTable',function($join) use ($tableDirection){
            $join->on('subTable.direction_id','=',"$tableDirection.id");
        })->select("$tableDirection.*","subTable.count_building")->get();
        return $list;
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
