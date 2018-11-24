<?php

namespace App\Services;
use App\Common\Constant;
use App\Models\BuildingType;
use App\Logics\BuildingLogic;
use App\Common\AppCommon;
use Illuminate\Http\Request;

class BuildingService extends BaseService{
    private $buildingLogic;

    public function __construct(BuildingLogic $buildingLogic)
    {
        $this->buildingLogic = $buildingLogic;
    }

    public function find($id){
        return $this->buildingLogic->find($id);
    }

    public function getAll(){
        return $this->buildingLogic->getAll();
    }

    private function getInfoBuilding(Request $request){
        $params = [];
        $params['name'] = $request->name;
        $params['sub_name'] = $request->sub_name;
        $params['investor_id'] = $request->investor_id;
        $params['classify_id'] = $request->classify_id;
        $params['management_agency_id'] = $request->management_agency_id;
        $params['direction_id'] = $request->direction_id;


        $params['productPrice'] = $request->product_price == null ? 0 : $request->product_price;
        $params['productCostPrice'] = $request->product_cost_price == null ? 0 : $request->product_cost_price;
        $params['productComparePrice'] = $request->product_compare_price == null ? 0 : $request->product_compare_price;
        $params['productSalePercent'] = $request->product_sale_percent == null ? 0 : $request->product_sale_percent;
        $params['isPublic'] = AppCommon::getIsPublic($request->is_public);
        $params['productDescription'] = $request->product_description;
        $params['productContent'] = $request->product_content;
    }

    public function create(Request $request){
//        return $this->buildingLogic->create($buildingTypeName);
    }

    public function update($id, $buildingTypeName){
        $buildingType = $this->buildingLogic->find($id);
        if(isset($buildingType)){
            $buildingType->type_name = $buildingTypeName;
            $this->buildingLogic->save($buildingType);
        }
    }

    public function destroy($id){
        $buildingType = $this->buildingLogic->find($id);
        if(isset($buildingType)){
            $buildingType->is_delete = Constant::$DELETE_FLG_ON;
            $this->buildingLogic->save($buildingType);
        }
    }

}
