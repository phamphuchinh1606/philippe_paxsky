<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\ClassificationLogic;

class ClassificationService extends BaseService{
    private $classificationLogic;

    public function __construct(ClassificationLogic $classificationLogic)
    {
        $this->classificationLogic = $classificationLogic;
    }

    public function find($id){
        return $this->classificationLogic->find($id);
    }

    public function getAll(){
        return $this->classificationLogic->getAll();
    }

    public function create($classifyName){
        return $this->classificationLogic->create($classifyName);
    }

    public function update($id, $classifyName){
        $classify = $this->classificationLogic->find($id);
        if(isset($classify)){
            $classify->name = $classifyName;
            $this->classificationLogic->save($classify);
        }
    }

    public function destroy($id){
        $classify = $this->classificationLogic->find($id);
        if(isset($classify)){
            $classify->is_delete = Constant::$DELETE_FLG_ON;
            $this->classificationLogic->save($classify);
        }
    }

}
