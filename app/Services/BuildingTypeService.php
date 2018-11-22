<?php

namespace App\Services;
use App\Common\Constant;
use App\Models\BuildingType;
use App\Logics\BuildingTypeLogic;

class BuildingTypeService extends BaseService{
    private $buildingTypeLogic;

    public function __construct(BuildingTypeLogic $buildingTypeLogic)
    {
        $this->buildingTypeLogic = $buildingTypeLogic;
    }

    public function find($id){
        return $this->buildingTypeLogic->find($id);
    }

    public function getAll(){
        return $this->buildingTypeLogic->getAll();
    }

    public function create($buildingTypeName){
        return $this->buildingTypeLogic->create($buildingTypeName);
    }

    public function update($id, $buildingTypeName){
        $buildingType = $this->buildingTypeLogic->find($id);
        if(isset($buildingType)){
            $buildingType->type_name = $buildingTypeName;
            $this->buildingTypeLogic->save($buildingType);
        }
    }

    public function destroy($id){
        $buildingType = $this->buildingTypeLogic->find($id);
        if(isset($buildingType)){
            $buildingType->is_delete = Constant::$DELETE_FLG_ON;
            $this->buildingTypeLogic->save($buildingType);
        }
    }

}
