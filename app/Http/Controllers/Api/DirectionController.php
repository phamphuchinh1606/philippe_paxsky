<?php

namespace App\Http\Controllers\Api;

use App\Common\AppCommon;
use Illuminate\Http\Request;

class DirectionController extends ControllerApi
{
    public function directionList(){
        $directions = $this->directionService->getDirectionAndCountBuilding();
        $listResult = [];
        foreach ($directions as $direction){
            $directionItem = new \StdClass();
            $directionItem->direction_id = $direction->id;
            $directionItem->direction_name = $direction->name;
            $directionItem->count_building = isset($direction->count_building) ? $direction->count_building : 0;
            $listResult[] = $directionItem;
        }
        return $this->json($listResult);
    }
}
