<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\InvestorLogic;

class InvestorService extends BaseService{
    private $investorLogic;

    public function __construct(InvestorLogic $investorLogic)
    {
        $this->investorLogic = $investorLogic;
    }

    public function find($id){
        return $this->investorLogic->find($id);
    }

    public function getAll(){
        return $this->investorLogic->getAll();
    }

    public function create($investorName){
        return $this->investorLogic->create($investorName);
    }

    public function update($id, $investorName){
        $investor = $this->investorLogic->find($id);
        if(isset($investor)){
            $investor->name = $investorName;
            $this->investorLogic->save($investor);
        }
    }

    public function destroy($id){
        $investor = $this->investorLogic->find($id);
        if(isset($investor)){
            $investor->is_delete = Constant::$DELETE_FLG_ON;
            $this->buildingTypeLogic->save($investor);
        }
    }

}
