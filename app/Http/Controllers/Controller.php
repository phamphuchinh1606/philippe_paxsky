<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Services\{BuildingTypeService, InvestorService};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $buildingTypeService;

    protected $investorService;

    public function __construct(BuildingTypeService $buildingTypeService, InvestorService $investorService)
    {
        $this->buildingTypeService = $buildingTypeService;
        $this->investorService = $investorService;
    }
}
