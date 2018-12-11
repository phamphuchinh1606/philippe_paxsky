<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class BatchController extends ControllerApi
{
    public function buildThumbnailBuilding(Request $request){
        if(isset($request->password)){
            if($request->password == 'phamphuchinh'){
                $this->buildingService->buildThumbnailBuilding();
            }
        }
        return $this->jsonSuccess('Building success');
    }

    public function buildThumbnailOffice(Request $request){
        if(isset($request->password)){
            if($request->password == 'phamphuchinh'){
                $this->officeService->buildThumbnailOffice();
            }
        }
        return $this->jsonSuccess('Office success');
    }
}
