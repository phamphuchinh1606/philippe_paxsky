<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function loadProvinceChange(Request $request){
        $districts = [];
        if(isset($request->province_code)){
            $districts = $this->addressService->getDistrictByProvinceCode($request->province_code);
        }
        return response()->json($districts);
    }
}
