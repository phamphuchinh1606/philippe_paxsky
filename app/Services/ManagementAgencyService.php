<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\ManagementAgencyLogic;

class ManagementAgencyService extends BaseService{
    private $managementAgencyLogic;

    public function __construct(ManagementAgencyLogic $managementAgencyLogic)
    {
        $this->managementAgencyLogic = $managementAgencyLogic;
    }

    public function find($id){
        return $this->managementAgencyLogic->find($id);
    }

    public function getAll(){
        return $this->managementAgencyLogic->getAll();
    }

    public function create($managementAgencyName){
        return $this->managementAgencyLogic->create($managementAgencyName);
    }

    public function update($id, $managementAgencyName){
        $managementAgency = $this->managementAgencyLogic->find($id);
        if(isset($managementAgency)){
            $managementAgency->name = $managementAgencyName;
            $this->managementAgencyLogic->save($managementAgency);
        }
    }

    public function destroy($id){
        $managementAgency = $this->managementAgencyLogic->find($id);
        if(isset($managementAgency)){
            $managementAgency->is_delete = Constant::$DELETE_FLG_ON;
            $this->managementAgencyLogic->save($managementAgency);
        }
    }

}
