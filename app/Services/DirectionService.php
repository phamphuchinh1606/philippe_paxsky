<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\DirectionLogic;

class DirectionService extends BaseService{
    private $directionLogic;

    public function __construct(DirectionLogic $directionLogic)
    {
        $this->directionLogic = $directionLogic;
    }

    public function find($id){
        return $this->directionLogic->find($id);
    }

    public function getAll(){
        return $this->directionLogic->getAll();
    }

    public function create($directionName){
        return $this->directionLogic->create($directionName);
    }

    public function update($id, $directionName){
        $direction = $this->directionLogic->find($id);
        if(isset($direction)){
            $direction->name = $directionName;
            $this->directionLogic->save($direction);
        }
    }

    public function destroy($id){
        $direction = $this->directionLogic->find($id);
        if(isset($direction)){
            $direction->is_delete = Constant::$DELETE_FLG_ON;
            $this->directionLogic->save($direction);
        }
    }

}
