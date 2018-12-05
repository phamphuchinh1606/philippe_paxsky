<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class DirectionController extends ControllerApi
{
    public function directionList(){
        $directions = $this->directionService->getAll();
        $listResult = [];
        foreach ($directions as $direction){
            $directionItem = new \StdClass();
            $directionItem->direction_id = $direction->id;
            $directionItem->direction_name = $direction->name;
            $listResult[] = $directionItem;
        }
        return $this->json($listResult);
    }
}
